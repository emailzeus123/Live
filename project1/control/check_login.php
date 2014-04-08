<?php

include('../model/user.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/model/user.php');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

echo $email . '<br>' . $password . "<br>";
//echo $_SERVER['DOCUMENT_ROOT'].'/model/user.php';

$conn = mysqli_connect('localhost', 'root', '', 'codeigniter');
$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '{$email}' AND password = '{$password}'");
//$result = mysqli_query($conn, "SELECT * FROM user");

//var_dump(mysqli_fetch_array($result));

$user = new User();

//$user->email = $email;
//$user->password = $password;
//echo $user->check_user();
while($row = mysqli_fetch_array($result)){
   $user = new User();
   
   $user->email = $row['username'];
   $user->password = $row['password'];
   echo $user->check_user();
   //break; 

}


