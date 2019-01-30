<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Experts_model
 * 
 * @author leometric
 * 
 * developed by V2
 * Copyright 2018 Leometric Technology. All Rights Reserved.
 */
class Experts_model extends CI_Model {

    public function get_experts($param = []) {

        if (array_key_exists("start", $param) && array_key_exists("limit", $param)) {
            $this->db->limit($param['limit'], $param['start']);
        } elseif (!array_key_exists("start", $param) && array_key_exists("limit", $param)) {
            $this->db->limit($param['limit']);
        }
        $res = $this->db->get('experts')->result();
        return $res;
    }

    public function get_expert($expert_id) {
        $res = $this->db->where(['expert_id' => $expert_id])->get('experts')->row();
        return $res;
    }

    public function get_experts_total() {
        
    }

    public function add_expert($data) {
        $this->db->insert('experts', $data);
        return $this->db->insert_id();
    }

    public function update_expert($data, $expert_id) {
        $this->db->update('experts', $data, ['expert_id' => $expert_id]);
        return $expert_id;
    }

}
