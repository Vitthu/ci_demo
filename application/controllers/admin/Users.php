<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 * 
 * @author leometric
 * 
 * developed by V2
 * Copyright 2018 Leometric Technology. All Rights Reserved.
 */
class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isAdminLogged()) {
            redirect(base_url() . 'user');
        }
        $this->load->model('Users_model', 'users');
    }

    public function index() {
        $s_data['sidebar_id'] = 'Dashboard';
        $this->load->view('admin/header_view');
        $this->load->view('admin/sidebar_view', $s_data);
        $this->load->view('admin/dashboard_view');
        $this->load->view('admin/footer_view');
    }

    public function color() {
        $this->load->view('color');
    }

}
