<?php
include_once __DIR__.'/../controller/orderController.php';
$order_id=$_GET['id'];
$order=new OrderController();
$order->delivered($order_id);
header("location: order.php");

