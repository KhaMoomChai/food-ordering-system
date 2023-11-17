<?php
if(!isset($_SESSION)){ session_start();}

include_once __DIR__."/controller/customer_orderController.php";
$order=new customer_orderController();
$deli=$_SESSION['order']['delivery_fee'];
$deli_id=$_SESSION['order']['delivery_fee_id'];
$sub=$_SESSION['order']['subtotal'];
$totalAmount=$deli + $sub;
$id=$_SESSION['my_login']['id'];
$user=$order->getUser($id);
foreach($user as $u){
    $order->doCheckout($u['id'],$totalAmount);
}
