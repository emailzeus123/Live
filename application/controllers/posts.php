<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of posts
 *
 * @author maxx
 */
class Posts extends CI_Controller {
    
    public function index(){
        $this->load->model('post');
        $data['posts'] = $this->post->get_posts();
        $this->load->view('post_index',$data);
        
    }
}
