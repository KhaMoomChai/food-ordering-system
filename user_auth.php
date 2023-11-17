<?php
if(!isset($_SESSION)){ session_start();}

if(!isset($_SESSION['my_login'])){

    header("location: login.php");
    
    exit();//if you don't login,no permission to enter page.
}