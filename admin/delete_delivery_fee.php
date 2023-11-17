<?php
include_once __DIR__.'/../controller/deliveryfeeController.php';

$id=$_POST['id'];
$delifee_con=new DeliveryfeeController();
$result=$delifee_con->deleteDelifee($id);
if($result)
{
    echo 'success';
}
else
{
    echo "You can't delete as it has related child data";
}


?> 