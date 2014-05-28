<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of testing
 *
 * @author maxx
 */
class testing extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
       // var_dump($this->db->get('users')->result());
       //var_dump($this->hash('admin'));
        //$this->db->where(array('password'=>$this->hash('admin')));
        var_dump($this->db->get('users')->result());
        echo '<br>';
        echo $this->hash('admin');
    }
    public function hash($string){
        return hash('sha512', $string. config_item('encryption_key'));
    }
}
