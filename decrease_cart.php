<?php
//item qty<=1 ///unset
if(!isset($_SESSION)){ session_start();}

 $id=$_GET['id'];
 foreach ($_SESSION['cart'] as $c_id=>$qty){
     if($id==$c_id) {

         if ($qty <= 1) {
             if (count($_SESSION['cart']) <= 1) {
                 unset($_SESSION['cart']);
             } else {
                 unset($_SESSION['cart'][$id]);
             }

         } else {
             $_SESSION['cart'][$id]--;
         }
     }
 }
 header("location: menudetails.php");