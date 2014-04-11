<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of main_page
 *
 * @author maxx
 */
class Main_page extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('footer');
    }

}
