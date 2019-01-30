<?php

date_default_timezone_set('Asia/Kolkata');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
              $this->db->query("SET time_zone='+5:30'");
    }
    public function checkLogin($username, $password) {

        $query = $this->db->select('*')->where(['password' => $password, 'username' => $username, 'status' => 1])->get('users');
        if ($query) {
            if ($query->num_rows() == 1) {
                $rst_id = 0;
                foreach ($query->result() as $rows) {

                    $data = array(
                        'user_id' => $rows->id,
                        'user_group_id' => $rows->user_group_id,
                        'first_name' => $rows->first_name,
                        'token' => md5(rand()),
                        'username' => $rows->username,
                        'first_name' => $rows->first_name,
                        'profile_photo' => $rows->profile_photo,
                        'logged_in' => TRUE,
                        'token' => md5(rand()),
                    );
                }
                $this->session->set_userdata($data);
                $uId = $this->session->userdata('user_id');
                $data1['date_modified'] = date("Y-m-d H:i:s");
                $this->user_model->updateProfile($data1, $uId);
                return true;
            }
        }
        return false;
    }

    public function checkActive($username) {
        $query = $this->db->select('*')->where(['username' => $username, 'status' => 1])->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password, $id) {
        $query = $this->db->query("SELECT * FROM users WHERE password='$password' AND id='$id'");
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProfile($data, $id) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function getUserInfo() {
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * FROM users WHERE id=$user_id");
        return $query->row_array();
    }

    public function getUser($user_id) {
        $query = $this->db->query("SELECT * FROM users WHERE id=$user_id");
        return $query->row_array();
    }

    public function checkEmailExist($email_id) {
        $query = $this->db->query("SELECT * FROM users WHERE username='$email_id'");
        if ($query->num_rows() == 1) {
            return true;
        }
        return false;
    }

    public function getUserName($email_id) {
        $query = $this->db->get_where('user', array('email_id' => $email_id));
        return $query->row_array();
    }

    public function add_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function update_user($data, $id) {
        $this->db->insert('users', $data, ['id' => $id]);
        return $id;
    }

    public function checkMobile($username, $mobile) {

        $query = $this->db->query("SELECT * FROM users u left join vendors v  on u.id =v.user_id  WHERE u.username='$username' and (u.contact='$mobile' or v.mobile1='$mobile')");
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserSalt($username) {

        $query = $this->db->where(array('username' => $username))->get('users')->row();
        if ($query) {
            return $query->salt;
        } else {
            return FALSE;
        }
    }

}
