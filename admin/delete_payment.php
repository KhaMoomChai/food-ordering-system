<?php
include_once __DIR__. '/../controller/paymentController.php';
$id=$_POST['id'];
$payment_con=new PaymentController();
$result=$payment_con->deletePayment($id);
if($result)
{
    echo "success";
}
else{
    echo "YOu can't delete as it has releated child data";
}

?>