<h2>Register User</h2>
<?php

    echo validation_errors();
    echo form_open(base_url().'index.php/users/register');
    $username = array(
        'type'=>'text',
        'name'=>'username',
        'value'=>  set_value('username')
    );
    $email = array(
        'type'=>'text',
        'name'=>'email',
        'value'=>  set_value('email')
    );
    $password = array(
        'type'=>'password',
        'name'=>'password'
    );
    $password2 = array(
        'type'=>'password',
        'name'=>'password2'
    );
    $user_type = array(''=>'--Select One --','user'=>'User','admin'=>'Admin','author'=>'Author');
    echo form_label('Username','username');
    echo form_input($username).'<br>';
    echo form_label('Email','email');
    echo form_input($email).'<br>';
    echo form_label('Password','password');
    echo form_input($password).'<br>';
    echo form_label('Password Confirmed','password2');
    echo form_input($password2).'<br>';
    echo form_label('User Type','user_type');
    echo form_dropdown('user_type',$user_type).'<br>';
    
    echo form_submit('submit','Submit');
    echo form_close();
?>