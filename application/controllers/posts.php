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

    public function __construct() {
        parent::__construct();
        $this->load->model('post');
    }

    public function index($start = 0) {
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'index.php/posts/index';
        $config['total_rows'] = $this->post->get_page_count();
        $config['per_page'] = 1;
        $this->pagination->initialize($config);

        $data['pages'] = $this->pagination->create_links();
        $data['posts'] = $this->post->get_posts(1, $start);
        $this->load->view('post_index', $data);
    }

    public function post($postID) {
        $data['post'] = $this->post->get_post($postID);
        $this->load->view('post_index', $data);
    }

    public function correct_permission($required) {
        $user_type = $this->session->userdata('user_type');
        if ($required == 'user') {
            if ($user_type) {
                return true;
            }
        } else if ($required == 'author') {
            if ($user_type == 'author' || $user_type == 'admin') {
                return true;
            }
        } else if ($required == 'admin') {
            if ($user_type == 'admin') {
                return true;
            }
        }
    }

    public function new_post() {
        if (!$this->correct_permission('author')) {
            redirect(base_url() . 'index.php/users/login');
        }
        if ($_POST) {
            $data['title'] = $this->input->post('title',true);
            $data['post'] = $this->input->post('post',true);
            $data['active'] = $this->input->post('active',true);
            $this->post->insert($data);
            redirect();
        }else{
            $this->load->view('new_post');
        }
    }

    public function delete_post() {
        if (!$this->correct_permission('author')) {
            redirect(base_url() . 'index.php/users/login');
        }
        $this->post->delete($_GET['postID']);
        redirect();
    }

    public function edit_post() {
        if (!$this->correct_permission('author')) {
            redirect(base_url() . 'index.php/users/login');
        }
        $data['postID'] = $_GET['postID'];
        $data['title'] = $_GET['title'];
        $data['post'] = filter_input(INPUT_GET, 'post');
        $data['active'] = 1;
        $this->load->view('edit_post', $data);
    }

    public function update_post() {
        $postID = filter_input(INPUT_POST, 'postID');
        $data = array('title' => filter_input(INPUT_POST, 'title'),
            'post' => filter_input(INPUT_POST, 'post'),
            'active' => filter_input(INPUT_POST, 'active'));
        $this->post->update($postID, $data);
        redirect();
    }

}
