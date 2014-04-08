<?php

class User{
    public $email;
    public $password;
    
    public function check_user(){
        //echo $this->email."<br>".$this->password;
        //echo 'testing';
        return $this->email."<br>".$this->password;
    }
}