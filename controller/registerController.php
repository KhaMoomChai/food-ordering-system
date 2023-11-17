<?php
include_once __DIR__. '/../model/user_account.php'; 
echo $name=$_POST['name'];
echo $email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$address=$_POST['address'];
$user=new User();
$user->register($name,$email,$password,$confirm_password,$address);
