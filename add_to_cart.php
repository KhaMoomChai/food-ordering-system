<?php
if(!isset($_SESSION)){ session_start();}

$id=$_GET['id'];
$_SESSION['cart'][$id]++;

header("location: menudetails.php");