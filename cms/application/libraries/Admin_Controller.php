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
    }
}
