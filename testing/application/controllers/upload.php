<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('upload_form', array('error' => ' '));
        //mkdir('./uploads', 0777); 
        //echo base_url('upload');
    }

    function do_upload() {
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        //$data['path'] = $config['upload_path']; 

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors(), 'path' => './uploads');

            $this->load->view('upload_form', $error);
            $this->load->helper('file');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
            $this->load->view('upload_success', $data);
        }
    }

    public function resize($path, $file) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 150;
        $config['height'] = 75;
        $config['new_image'] = './uploads/'.$file;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

}
