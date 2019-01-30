<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Experts
 * 
 * @author leometric
 * 
 * developed by V2
 * Copyright 2018 Leometric Technology. All Rights Reserved.
 */
class Experts extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isAdminLogged()) {
            redirect(base_url() . 'user');
        }
        $this->load->model('Category_model', 'categories');
        $this->load->model('Experts_model', 'expert');
    }

    public function index() {

        $url = '';
        $page = $this->input->get('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        $data['experts'] = $this->expert->get_experts(array('start' => $offset, 'limit' => 10));
        $total_orders = $this->expert->get_experts_total();
        $config['base_url'] = base_url() . 'admin/riders';
        $config['total_rows'] = $total_orders;
//        $config['per_page'] = $this->perPage;
        $this->pagination->initialize($config);
        $s_data['sidebar_id'] = 'experts';
        $this->load->view('admin/header_view');
        $this->load->view('admin/sidebar_view', $s_data);
        $this->load->view('admin/experts_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function add() {
        $data['expert_categories'] = [];
        $data['action'] = base_url() . 'admin/experts/add';
        $data['categories'] = $this->categories->get_categories();
        if ($this->request->post) {
            $img = '';
            if ($_FILES['file']['name']) {
                $img = $_FILES['file']['name'];
                $img = str_replace(' ', '_', $img);
                $img = explode('.', $img);
                $img = $img[0] . time() . '.' . $img[1];
            }

            $config['upload_path'] = './uploads/experts/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
//            $config['max_size'] = '100000';
            $config['width'] = 1286;
            $config['height'] = 408;
            $config['file_name'] = $img;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $this->request->post['image'] = $img;
            }
            $this->request->post['categories'] = json_encode($this->request->post['categories']);
            $this->request->post['password'] = md5('pass123');
            $expert_id = $this->expert->add_expert($this->request->post);
            if ($expert_id) {
                $this->session->set_flashdata('success', 'Expert Added Successfully');
                redirect(base_url() . 'admin/experts');
            }
        }
        $s_data['sidebar_id'] = 'experts';
        $this->load->view('admin/header_view');
        $this->load->view('admin/sidebar_view', $s_data);
        $this->load->view('admin/experts_add_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function update() {
        $data['categories'] = $this->categories->get_categories();
        if ($this->request->get['expert_id']) {
            $data['action'] = base_url() . 'admin/experts/update?expert_id=' . $this->request->get['expert_id'];
            $expert = $this->expert->get_expert($this->request->get['expert_id']);
            $data['name'] = $expert->name;
            $data['email'] = $expert->email;
            $data['designation'] = $expert->designation;
            $data['expert_categories'] = json_decode($expert->categories);
            $data['is_active'] = $expert->is_active;
            $data['about'] = $expert->about;
            $data['image'] = base_url() . 'uploads/experts/' . $expert->image;
            if ($this->request->post) {
                $img = '';
                if ($_FILES['file']['name']) {
                    $img = $_FILES['file']['name'];
                    $img = str_replace(' ', '_', $img);
                    $img = explode('.', $img);
                    $img = $img[0] . time() . '.' . $img[1];


                    $config['upload_path'] = './uploads/experts/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//            $config['max_size'] = '100000';
                    $config['width'] = 1286;
                    $config['height'] = 408;
                    $config['file_name'] = $img;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('file')) {
                        $this->request->post['image'] = $img;
                    }
                }
                $this->request->post['categories'] = json_encode($this->request->post['categories']);
                $this->expert->update_expert($this->request->post, $expert->expert_id);
                $this->session->set_flashdata('success', 'Expert Updated Successfully');
                redirect(base_url() . 'admin/experts');
            }
            $s_data['sidebar_id'] = 'experts';
            $this->load->view('admin/header_view');
            $this->load->view('admin/sidebar_view', $s_data);
            $this->load->view('admin/experts_add_view', $data);
            $this->load->view('admin/footer_view');
        } else {
            redirect(base_url() . 'admin/experts/add');
        }
    }

}
