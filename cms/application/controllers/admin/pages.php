<?php

/**
 * Description of page
 *
 * @author maxx
 */


class Pages extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('page_m');
    }
    public function index(){
        //get all pages
        $this->data['pages'] = $this->page_m->get_with_parent();
        //Load view
        $this->data['subview'] = 'admin/page/index';
        $this->load->view('admin/_layout_main',  $this->data);
    }
    public function edit($id = NULL){
        //Get a page or set a new one
        if($id){
            $this->data['page'] = $this->page_m->get($id);
            count($this->data['page']) || $this->data['errors'][] = 'User could not be found';
        }else{
            $this->data['page'] = $this->page_m->get_new();
        }
        
        $this->data['pages_no_parents'] = $this->page_m->get_no_parents();
        
        //Set up the form
        $rules = $this->page_m->rules;
        //$id || $rules['password'] .= '|required';
        $this->form_validation->set_rules($rules);
        //Process the form
        if($this->form_validation->run() == TRUE){            
            $data = $this->page_m->array_from_post(array('title','slug','body','parent_id'));
            $this->page_m->save($data, $id);
            redirect('admin/pages');
        }
        //Load the view
        $this->data['subview'] = 'admin/page/edit';
        $this->data['path'] = '';
        $this->load->view('admin/_layout_main', $this->data);
    }
    public function delete($id){
        $this->page_m->delete($id);
        redirect('admin/pages');
    }
    
    
    
    public function _unique_slug($str){
        //Do not validate if slug already exists
        //Unless it's the slug for the current page
        $id = $this->uri->segment(4);
        $this->db->where('slug',  $this->input->post('slug'));
        !$id || $this->db->where('id != '.$id);
        $page = $this->page_m->get();
        
        if(count($page)){
            $this->form_validation->set_message('_unique_slug','%s should be unique');
            return FALSE;
        }
        return TRUE;
    }
}
