<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Test_Model
 *
 * @author maxx
 */
class Page extends Frontend_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('page_m');
    }
    
    public function index(){
        var_dump($this->page_m->get_by(array('slug'=>'about')));
    }
    
    public function save(){
        $data = array(
           'order'=> '1'
        );
        $id = $this->page_m->save($data, 1);
        var_dump($id);
    }
    public function delete(){
        $this->page_m->delete(5);
    }
}
