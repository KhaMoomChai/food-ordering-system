<?php
include_once __DIR__.'/../controller/productController.php';

$id=$_POST['id'];
$product_con=new productController();
$result=$product_con->deleteProduct($id);
if($result)
{
    echo "Success";
}
else
{
    echo "You can't delete as it has related child data";
}


?> 