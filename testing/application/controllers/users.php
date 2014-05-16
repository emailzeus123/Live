<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author maxx
 */
class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    public function login() {
        $data['error'] = 0;
        if ($_POST) {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $user_type = $this->input->post('user_type', true);
            $user = $this->user->login($username, $password, $user_type);
            if (!$user) {
                $data['error'] = 1;
            } else {
                $this->session->set_userdata('userID', $user['userID']);
                $this->session->set_userdata('user_type', $user['user_type']);
                redirect();
            }
        }
        $this->load->view('login', $data);
    }

    public function register() {
        if ($_POST) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
            $this->form_validation->set_rules('password2', 'Password Confirmed', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = array( 
                    'username' => $this->input->post('username', true),
                    'password' => $this->input->post('password', true),
                    'password2' => $this->input->post('password2', true),
                    'user_type' => $this->input->post('username', true),
                    'email' => $this->input->post('email', true)
                );
                $userID = $this->user->create_user($data);
                $this->session->set_userdata('userID', $userID);
                $this->session->set_userdata('user_type', $this->input->post('username', true));
                redirect();
            } 
        }   
        $this->load->view('register_user');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
