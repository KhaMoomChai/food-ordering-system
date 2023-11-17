<?php 
include_once __DIR__. '/../model/user_account.php'; 
  $email=$_POST['email'];
  $password=$_POST['password'];
  $user=new User();
  $user->login($email,$password);
?>