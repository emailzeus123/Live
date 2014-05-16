<?php

/**
 * Login controller class
 */
class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*
     * index method will load the login view
     */
    public function index() {
        $data['path'] = "index.php/login/check_login";
        $this->load->view('login_view',$data);
    }

    /*
     * check_login method will check if user has a valid email and password
     */
    public function check_login() {
        $data['email'] = filter_input(INPUT_POST, 'email');
        $data['password'] = filter_input(INPUT_POST, 'password');
        $data['path'] = "login/check_login";
        $this->load->model('user');
        $this->user->email = filter_input(INPUT_POST, 'email');
        $this->user->password = filter_input(INPUT_POST, 'password');

        if ($this->user->check_user() == 1) {
            
        }else{
            
            $this->load->view('login_view',$data);
        }
    }

    public function testing() {
        $check = 1;
        if ($check == 1) {
            $method = 'one';
        } else {
            $method = 'two';
        }
        echo $this->$method();  
    }

    public function one() {
        return "one is good";
    }

    public function two() {
        return "two is good";
    }

}
