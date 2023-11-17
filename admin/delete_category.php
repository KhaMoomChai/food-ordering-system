<?php
include_once __DIR__.'/../controller/categoryController.php';

$id=$_POST['id'];
$category_con=new CategoryController();
$result=$category_con->deleteCategory($id);
if($result)
{
    echo "success";
}
else{
    echo "YOu can't delete as it has releated child data";
}

?> 
