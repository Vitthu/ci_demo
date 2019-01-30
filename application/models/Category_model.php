<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category_model
 * 
 * @author leometric
 * 
 * developed by V2
 * Copyright 2018 Leometric Technology. All Rights Reserved.
 */
class Category_model extends CI_Model {

    public function get_categories() {
        return $this->db->get('session_categories')->result();
    }

    public function get_topics($category_id = NULL) {
        if (!is_null($category_id)) {
            $this->db->where(['category_id' => $category_id]);
        }
        return $this->db->get('categories_topis')->row();
    }

    public function get_topic($topic_id) {
        return $this->db->where(['topic_id' => $topic_id])->get('categories_topis')->row();
    }

    public function add_category($data) {
        return $this->db->insert('session_categories', $data);
    }

    public function update_category($data, $category_id) {
        return $this->db->update('session_categories', $data, ['category_id' => $category_id]);
    }

    public function get_category($category_id) {
        return $this->db->where(['category_id' => $category_id])->get('session_categories')->row();
    }

    public function get_sessions() {
        return $this->db->get('sessions')->result();
    }

    public function getSession($session_id) {
        return $this->db->where(['session_id' => $session_id])->get('sessions')->row();
    }

    public function add_sessions($data) {
        $this->db->insert('sessions', $data);
        return $this->db->insert_id();
    }

    public function update_sessions($data, $session_id) {
        $this->db->update('sessions', $data, ['session_id' => $session_id]);
        return $session_id;
    }

    public function active_sessions($expert = NULL) {
        if (!is_null($expert)) {
            $this->db->where(['s.expert_id' => $expert]);
        }
        $res = $this->db->select('s.name as session_name ,s.*,e.*,e.name as expert_name')->from('sessions s')->join('experts e', 'e.expert_id=s.expert_id', 'inner')->group_by('s.session_id')->where('DATE(NOW()) BETWEEN start_date AND end_date')->get()->result();
//     echo $this->db->last_query();die;
        return $res;
    }

    public function get_session($session_id) {
        return $this->db->select('s.name as session_name ,s.*,e.*,e.name as expert_name')->from('sessions s')->join('experts e', 'e.expert_id=s.expert_id')->where(['session_id' => $session_id])->get()->row();
    }

    public function upcomming_sessions($expert = NULL) {
        if (!is_null($expert)) {
            $this->db->where(['s.expert_id' => $expert]);
        }
        $res = $this->db->select('s.name as session_name ,s.*,e.*,e.name as expert_name')->from('sessions s')->join('experts e', 'e.expert_id=s.expert_id', 'inner')->group_by('s.session_id')->where('start_date > DATE(NOW())')->get()->result();
//     echo $this->db->last_query();die;
        return $res;
    }

    public function close_sessions() {
        
    }

}
