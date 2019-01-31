<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $token;

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('pagination');
    }

    public function index() {
        if ($this->input->post()) {
            print_r($this->input->post('username'));
            $this->db->update('users', ['first_name' => $this->input->post('username')], ['id' => 1]);
            die;
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $res = $this->user_model->checkLogin($username, $password);


            if ($res) {
                //$this->token = $this->session->userdata('token');
                $user_group_id = $this->session->userdata('user_group_id');
                if ($user_group_id == 1) {
                    redirect(base_url() . 'admin/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Your account not verified');
                $data['user'] = $username;
                $data['pass'] = $this->input->post('password');
                $this->load->view('admin_login_view', $data);
            }
        } else {

            $this->load->view('admin_login_view');
        }
    }

    public function checkLogin() {
        $json = array();
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $res = $this->user_model->checkLogin($username, $password);
        $status = $this->user_model->checkActive($username);
        if ($res && $status) {
            $json['status'] = TRUE;
        } elseif ($res && !$status) {
            $json['status'] = FALSE;
            $json['message'] = "Please Contact Admin ..! Account Not Verified";
        } else {
            $json['status'] = FALSE;
            $json['message'] = "Incorrect username or password";
        }
        echo json_encode($json);
    }

    public function userLogout() {
        $this->db->order_by("id", 'DESC');
        $this->db->limit(1);
        $this->db->update('merchant_active_history', ['inactive_time' => date('Y-m-d H:i:s')], ['date' => date('Y-m-d'), 'vendor_id' => $this->session->userdata('merchant_id')]);
        $this->db->update('users', ['is_logged' => 0], ['id' => $this->session->userdata('user_id')]);
        $this->session->sess_destroy();
        redirect('user', 'refresh');
    }

    public function userProfile() {

        if (!isAdminLogged()) {
            redirect(base_url() . 'user');
        }
        $s_data['sidebar_id'] = 'profile';

        $data['userInfo'] = $this->user_model->getUserInfo();
        $this->load->view('admin/header_view');
        $this->load->view('admin/sidebar_view', $s_data);
        $this->load->view('admin/user_profile_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function updateProfile() {
        $this->token = $this->session->userdata('token');
        if (!isAdminLogged()) {
            redirect(base_url() . 'user');
        }
        if ($this->input->post('action_type') == 'update') {
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email_id');
            $id = $this->input->post('user_id');
            $res = $this->user_model->updateProfile($data, $id);
            if ($res) {
                $user = array('first_name' => $this->input->post('first_name'), 'email_id' => $this->input->post('email_id'));
                $this->session->set_userdata($user);
                echo json_encode(array("success" => 'Profile updated successfully.', 'first_name' => $this->input->post('first_name'), 'last_name' => $this->input->post('last_name')));
            } else {
                echo json_encode(array("error" => 'Duplicate Email id or Mobile no'));
            }
        }
    }

    public function changePassword() {
        $current_pwd = md5($this->input->post('current_pwd'));
        $id = $this->session->userdata('user_id');
        $res = $this->user_model->checkPassword($current_pwd, $id);
        if ($res) {
            $data['password'] = md5($this->input->post('new_pwd'));
            $res = $this->user_model->updateProfile($data, $id);
            echo json_encode(array("success" => 'Password chnaged successfully'));
        } else {
            echo json_encode(array("error" => 'Current password does not match'));
        }
    }

    public function forgotPassword() {
        if ($this->input->post('email_id')) {
            $email_id = $this->input->post('email_id');
            $result = $this->user_model->checkEmailExist($email_id);
            if ($result) {
                $name = $this->user_model->getUserName($email_id);
                $data['fname'] = $name['first_name'];
                $data['password'] = mt_rand();
                $data['type'] = 'forgot';
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 587,
                    'smtp_user' => 'email@example.com',
                    'smtp_pass' => '*****'
                );
                $this->email->set_mailtype("html");
                $to = $email_id;
                $subject = "Forgot Password";
                $this->load->library("email", $config);
                $this->email->set_newline("\r\n");
                $this->email->from("email@example.com");
                $this->email->to($to);
                $this->email->subject($subject);
                $msg = $this->load->view('email_temp/reset_pwd_view', $data, TRUE);
                $this->email->message($msg);
                if ($this->email->send()) {
                    $data1['pwd'] = md5($data['password']);
                    $id = $name['user_id'];
                    $res = $this->user_model->updateProfile($data1, $id);
                    if ($res) {
                        echo 'success';
                    } else {
                        echo 'db_error';
                    }
                } else {
                    show_error($this->email->print_debugger());
                    echo 'email_error';
                }
            } else {
                echo 'notExist';
            }
        }
    }

    public function updateProfilePic() {
        $img = $_FILES['profile_image']['name'];
        $img = str_replace(' ', '_', $img);
        $img = explode('.', $img);
        $img = $img[0] . time() . '.' . $img[1];
        $config['upload_path'] = './uploads/profile_pic';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '100000';
        $config['file_name'] = $img;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('profile_image')) {
            echo json_encode(array("error" => $this->upload->display_errors()));
            die();
        } else {
            $id = $this->session->userdata('user_id');
            $pic = $this->user_model->getUser($id);
            $oldImg = $pic['profile_photo'];
            $data['profile_photo'] = $img;
            $res = $this->user_model->updateProfile($data, $id);
            $user = array('profile_photo' => $img);
            $this->session->set_userdata($user);
            $data = array('upload_data' => $this->upload->data());
            //create thumbnail                    
            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/profile_pic/' . $img;
            //$config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 150;
            $config['height'] = 150;
            $config['new_image'] = './uploads/profile_pic/thumb/' . $img;
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            if ($res) {
                if ($oldImg) {
                    $image_path = './uploads/profile_pic/' . $oldImg;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                    $image_path_thumb = './uploads/profile_pic/thumb/' . $oldImg;
                    if (file_exists($image_path_thumb)) {
                        unlink($image_path_thumb);
                    }
                }
            }
            echo json_encode(array("file" => $img));
            die();
        }
    }

    public function updateUserPassword() {
        $user_id = $this->input->post('user_id');
        $data1['pwd'] = md5($this->input->post('password'));
        $res = $this->user_model->updateProfile($data1, $user_id);

        $data['password'] = $this->input->post('password');
        $name = $this->user_model->getUser($user_id);
        $data['fname'] = $name['first_name'];
        $data['type'] = 'update';
        if ($res) {
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.mydomail.co.ug',
                'smtp_port' => 587,
                'smtp_user' => 'myname@mydomail.co.ug',
                'smtp_pass' => 'mypass'
            );
            $this->email->set_mailtype("html");
            $to = $name['email_id'];
            $subject = "Update Password";
            $this->load->library("email", $config);
            $this->email->set_newline("\r\n");
            $this->email->from("mail@example.com");
            $this->email->to($to);
            $this->email->subject($subject);
            $msg = $this->load->view('email_temp/reset_pwd_view', $data, TRUE);
            $this->email->message($msg);
            if ($this->email->send()) {
                echo 'success';
            } else {
                show_error($this->email->print_debugger());
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

    public function set_sidebar_session() {
        $id = $this->input->post('id');
        $data = array('sidebar_id' => $id);
        $this->session->set_userdata($data);
    }

    public function term_conditions() {
        $this->load->view('term_conditions_view');
    }

    public function test2() {
        $s_data['sidebar_id'] = 'categories';
        $this->load->view('admin/header_view');
        $this->load->view('admin/sidebar_view', $s_data);
        $this->load->view('test');
        $this->load->view('admin/footer_view');
    }

}
