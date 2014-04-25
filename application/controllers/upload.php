<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() { 
        $this->load->view('upload_form', array('error' => ' '));
        //mkdir('./uploads2', 0777); 
        //echo base_url('upload');
    }

    function do_upload() {
        $config['upload_path'] = './uploads2';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);  
        //$data['path'] = $config['upload_path']; 
        
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors(),'path'=>'./uploads');

            $this->load->view('upload_form', $error);
            $this->load->helper('file');    
             
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);   
        } 
    }

}
