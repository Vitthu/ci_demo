<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->model('dashboard_model');
        if (!isAdminLogged()) {
            redirect(base_url() . 'user');
        }
    }

    public function index() {
        $s_data['sidebar_id'] = 'Dashboard';
        $this->load->view('admin/header_view');
        $this->load->view('admin/sidebar_view', $s_data);
        $this->load->view('admin/dashboard_view');
        $this->load->view('admin/footer_view');
    }

}
