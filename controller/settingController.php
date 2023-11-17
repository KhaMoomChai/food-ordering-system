<?php 
include_once __DIR__."/../user_auth.php";
include_once __DIR__."/../model/user_account.php";

$name=$_POST['name'];
$_SESSION['my_login']['name']=$name;
$p=$_POST["c_password"];
$n_p=$_POST["n_password"];
$c_n_p=$_POST["c_n_password"];

 $user=new User();
 $user->changePassword($name,$p,$n_p,$c_n_p);

?>