<?php



/**
 * Description of Admin_Controller
 *
 * @author maxx
 */

class Admin_Controller extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['meta_title'] = "My CMS";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user_m');
        
        $exception_urls = array(
            'admin/user/login',
            'admin/user/logout'
        );
        if(in_array(uri_string(), $exception_urls) == FALSE){
            if($this->user_m->loggedin() == FALSE){
                redirect('admin/user/login');
            }            
        }
    }
}
