<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author maxx
 */
class user extends Admin_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function login(){
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $this->user_m->login();
        }
        $this->data['subview'] = 'admin/user/login';
        $this->data['path'] = '#';
        $this->load->view('admin/_layout_modal', $this->data);
    }
    public function logout(){
        $this->user_m->logout();
    }
}
