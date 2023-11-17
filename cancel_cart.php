<?php
session_start();
if(isset($_SESSION['order'])){
    unset($_SESSION['order']);
    header("location: menudetails.php");
}else{
    unset($_SESSION['cart']);
    header("location: menudetails.php");
}
