<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_flash_message')) {

    /**
     * Error or success message
     * @param	none
     * @return	boolean
     */
    function get_flash_message() {
        $ci = &get_instance();
        if ($ci->session->flashdata('success') || $ci->session->flashdata('error')) {
            $isSuccess = ( $ci->session->flashdata('success') ) ? true : false;
            return '<div class="alert ' . ( ($isSuccess) ? 'alert-success' : 'alert-danger' ) . '">' .
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' .
                    ( ($isSuccess) ? $ci->session->flashdata('success') : $ci->session->flashdata('error') ) .
                    '</div>';
        }
    }

}

if (!function_exists('isAdminLogged')) {

    /**
     * check super admin or sub admin logged or not
     * @param	none
     * @return	boolean
     */
    function isAdminLogged() {
        $ci = &get_instance();
        $user_session = $ci->session->userdata('user_group_id');
        if (!empty($user_session) && ($user_session != '')) {
            return true;
        } else {
            return false;
        }
    }

}
if (!function_exists('isExpertLogged')) {

    /**
     * check super admin or sub admin logged or not
     * @param	none
     * @return	boolean
     */
    function isExpertLogged() {
        $ci = &get_instance();
        $user_session = $ci->session->userdata('role');
        if (!empty($user_session) && ($user_session == 'expert')) {
            return true;
        } else {
            return false;
        }
    }

}
if (!function_exists('isUserLogged')) {

    /**
     * check super admin or sub admin logged or not
     * @param	none
     * @return	boolean
     */
    function isUserLogged() {
        $ci = &get_instance();
        $user_session = $ci->session->userdata('role');
        if (!empty($user_session) && ($user_session == 'session_user')) {
            return true;
        } else {
            return false;
        }
    }

}
if (!function_exists('assets_url')) {

    function assets_url() {
        return base_url() . 'assets/';
    }

}