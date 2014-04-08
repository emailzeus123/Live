<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loging
 *
 * @author maxx
 */
class login extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        /*echo 'testing';
        $result = $this->db->get('user');
        echo "<br>";
        var_export($result->result());
        * */
        $this->load->view('login_view'); 
    }
    public function check_login(){
        //echo 'tesing '.filter_input(INPUT_POST, 'email');
        $data['email'] = filter_input(INPUT_POST, 'email');
        $data['password'] = filter_input(INPUT_POST, 'password');
        
        $this->load->model('user');
        $this->user->email = filter_input(INPUT_POST, 'email');
        $this->user->password = filter_input(INPUT_POST, 'password');
        
        //echo $this->user->check_user();
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('main_view',$data);
        $this->load->view('footer');
        
    }
    public function testing(){
        $check = 1;
        if($check == 1){
            $method = 'one';
        }else{
            $method = 'two';
        }
        echo $this->$method();
    }
    public function one(){
        return "one is good";
    }
    public function two(){
        return "two is good";
    }
}
