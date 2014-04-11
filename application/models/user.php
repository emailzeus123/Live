<?php

class User extends CI_Model{
    public $email;
    public $password;
    
    public function check_user(){
        $result = $this->db->get_where('user',array('username'=>$this->email,'password'=>$this->password));
        if(count($result->result()) == 1 ){
            return 1;
        }
        
    }
}