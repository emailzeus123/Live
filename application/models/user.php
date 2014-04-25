<?php

class User extends CI_Model{
    
    public function create_user($data){
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }
    
    public function login($username,$password,$user_type){
        $where = array('username'=>$username ,'password'=>$password, 'user_type'=>$user_type);
        $result = $this->db->get_where('user',$where);
        
        return $result->first_row('array');
    }




    /*public function check_user(){
        $result = $this->db->get_where('user',array('username'=>$this->email,'password'=>$this->password));
        if(count($result->result()) == 1 ){
            return 1;
        }
        
    }*/
}