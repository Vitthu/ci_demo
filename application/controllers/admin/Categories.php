<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categories
 * 
 * @author leometric
 * 
 * developed by V2
 * Copyright 2018 Leometric Technology. All Rights Reserved.
 */
class Categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model', 'categories');
        if (!isAdminLogged()) {
            redirect(base_url() . 'user');
        }
    }

    public function index() {
        $s_data['sidebar_id'] = 'categories';
        $data['categories'] = $this->categories->get_categories();
        $this->load->view('admin/header_view');
        $this->load->view('admin/sidebar_view', $s_data);
        $this->load->view('admin/categories_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function add_category() {
        $json['status'] = FALSE;
        if ($this->request->post) {
            $json['category_id'] = $this->categories->add_category($this->request->post);
            $json['status'] = TRUE;
        }
        echo json_encode($json);
    }

    public function update_category() {
        $json['status'] = FALSE;
        if ($this->request->post) {
            $category_id = $this->request->post['category_id'];
            $name = $this->request->post['name'];
            $is_active = $this->request->post['is_active'];
            $this->categories->update_category(['name' => $name, 'is_active' => $is_active], $category_id);
            $json['category_id'] = $category_id;
            $json['status'] = TRUE;
        }
        echo json_encode($json);
    }

}
