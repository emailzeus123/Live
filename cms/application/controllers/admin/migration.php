<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Migration
 *
 * @author maxx
 */
class Migration extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->library('migration');

        if (!$this->migration->current()) {
            
            show_error($this->migration->error_string());
            
        }else{
            echo "Migration worked!";
        }
    }

}
