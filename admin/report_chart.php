<?php
include_once "controllers/orderController.php";
$year=$_POST['year'];
$month=$_POST['month'];

$order_controller=new OrderController();

$result=$order_controller->reportOrder($year,$month);
$total_orders=[];
foreach($result as $row)
{
    $total_orders[]=$row['totalorders'];
}
echo json_encode($total_orders);
?>