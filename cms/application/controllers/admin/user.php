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


class User extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        
    }
    public function index(){
        //get all users
        $this->data['users'] = $this->user_m->get();
        //Load view
        $this->data['subview'] = 'admin/user/index';
        $this->load->view('admin/_layout_main',  $this->data);
    }
    public function edit($id = NULL){
        //Get a user or set a new one
        if($id){
            $this->data['user'] = $this->user_m->get($id);
            count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
        }else{
            $this->data['user'] = $this->user_m->get_new();
        }
        //Set up the form
        $rules = $this->user_m->rules_admin;
        //$id || $rules['password'] .= '|required';
        $this->form_validation->set_rules($rules);
        //Process the form
        if($this->form_validation->run() == TRUE){            
            $data = $this->user_m->array_from_post(array('name','email','password'));
            $data['password'] = $this->user_m->hash($data['password']);
            $this->user_m->save($data, $id);
            redirect('admin/user');
        }
        //Load the view
        $this->data['subview'] = 'admin/user/edit';
        $this->data['path'] = '';
        $this->load->view('admin/_layout_main', $this->data);
    }
    public function delete($id){
        $this->user_m->delete($id);
        redirect('admin/user');
    }
    
    public function login(){
        //Redirect a user if they are already logged in
        $dashboard = 'admin/dashboard';
        $this->user_m->loggedin() == FALSE || redirect($dashboard);
        
        //Set form
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        
        //Process from
        if($this->form_validation->run() == TRUE){   
            //WE can login and redirect
            if($this->user_m->login() == TRUE){
                redirect($dashboard);
            }else{
                $this->session->set_flashdata('error','That email/password comtination does not exist');
                redirect('admin/user/login','refresh');
            }
        }
        //Load view
        $this->data['subview'] = 'admin/user/login';
        $this->data['path'] = base_url('index.php/admin/user/login');
        $this->load->view('admin/_layout_modal', $this->data);
    }
    public function logout(){
        $this->user_m->logout();
    }
    public function _unique_email($str){
        //Do not validate if email already exists
        //Unless it's the email for the current user
        $id = $this->uri->segment(4);
        $this->db->where('email',  $this->input->post('email'));
        !$id || $this->db->where('id != '.$id);
        $user = $this->user_m->get();
        
        if(count($user)){
            $this->form_validation->set_message('_unique_email','%s should be unique');
            return FALSE;
        }
        return TRUE;
    }
}
