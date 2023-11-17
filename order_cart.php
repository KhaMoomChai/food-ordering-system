<?php 
if(!isset($_SESSION)){ session_start();}

if(!isset($_SESSION['cart'])){
    header("location: menudetails.php");
 }
 include_once __DIR__."/controller/customer_orderController.php";
 $order=new customer_orderController();
if(isset($_POST['checkout']))
{   
    $deli_error=0;$payment_error=0;
    if($_POST['delivery_fee_id']==""){
        $deli_error="1";
    }
    if($_POST['payment_type']==""){
        $payment_error="1";
    }
    if($deli_error==0 && $payment_error==0){
        $totalAmount=$_POST['totalAmount'];
        $_SESSION['order']['subtotal']=$_POST['subtotal'];   
        $_SESSION['order']['phone']=$_POST['phone'];   
        $_SESSION['order']['payment_type']=$_POST['payment_type'];   
        $_SESSION['order']['delivery_fee_id']=$_POST['delivery_fee_id']; 
        $delivery_fee=$order->deliveryFeeById($_POST['delivery_fee_id']);
        foreach($delivery_fee as $fee){
            $_SESSION['order']['delivery_fee']=$fee['fee'];
        }
        echo '<script>location.href="payment.php"</script>';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-6 ">
            <div class="card shopping-cart" style="border-radius: 15px;">
                <div class="card-body text-black">
                    <!-- <div class="row">
                        <div class="col-lg-6 px-5 py-4">
                            <h5 class="mb-4 pt-2 text-center fw-bold">Your products</h5>
                            <?php 
                            $totalAmount=0;
                            if(isset($_SESSION['cart'])){
                                foreach($_SESSION['cart'] as $id=>$qty){
                                    $products=$order->getPostForCart($id);
                                    foreach($products as $product){
                                        $totalAmount+=$product['price']*$qty;
                                    ?>

                                    <div class="one">
                             <div class="d-flex align-items-center mb-5">
                                <div class="flex-shrink-0">
                                    <img src="/uploads/<?php echo $product['image'];?>"
                                    class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                                </div>
                                <div class="product flex-grow-1 ms-3">
                                    <h5 class="text-primary"><?php echo $product['name'];?></h5>
                                    <h6 style="color: #9e9e9e;"><?php $product['description'];?></h6>
                                    <div class="d-flex align-items-center">
                                        <p class="product-price fw-bold mb-0 me-3">1000</p><span class=" pe-3">kyats</span>
                                        <div class="product-quantity pe-3">
                                            <a href="decrease_cart.php?id=<?php echo $product['id'] ?>">-<i class="fa fa-minus" aria-hidden="true"></i> </a>
                                            <?php echo $qty; ?>
                                            <a href="increase_cart.php?id=<?php echo $product['id'] ?>">+<i class="fa fa-plus" aria-hidden="true"></i> </a>
                                        </div>
                                        <p class="product-line-price fw-bold mb-0 me-3" ><?php echo $product['price']*$qty; ?></p><span class="pe-3">kyats</span>
                                    </div>
                                    
                                </div>
                             </div>
                        </div>

                                    <?php
                                    }
                                }
                            }
                            ?>
                            <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;"> 
                        
                        <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #f5fafc;">
                            <h5 class="fw-bold mb-0">Subtotal :</h5>
                            <h5 class="totals-value fw-bold mb-0" id="cart-subtotal"><?php echo $totalAmount; ?></h5>
                        </div>
                    </div> -->
                            

                        <div class="px-5 py-4">
                <h5 class="mb-4 pt-2 text-center fw-bold ">Delivery</h5>
                <?php if(isset($deli_error)&& $deli_error==1){?><span class="text-danger">Please select delivery city!</span><?php }?>

                <form class="mb-5" method="post">
                  <div class="form-outline mb-4">
                      <select name="payment_type" class="form-select form-select-md mb-3 " aria-label=".form-select-lg example">
                        <option value="">Select Payment Type</option>
                        <?php 
                            $payment=$order->paymentType();
                            foreach($payment as $p){
                                echo "<option value=".$p['id'].">".$p['payment_type']."</option>";
                            }
                        ?>
                      </select>
                      <select name="delivery_fee_id" class="deliveryFee form-select form-select-md mb-3 " aria-label=".form-select-lg example">
                        <option value="">Select City</option>
                        <?php 
                            $delivery_city=$order->deliveryFee();
                            foreach($delivery_city as $c){
                                echo "<option value=".$c['id'].">".$c['city_name']."</option>";
                            }
                        ?>
                      </select>
                      
                  </div>
                  
                  <div class="form-outline mb-5">
                        <label class="form-label" for="typeName">Phone Number</label>
                        <input type="text" class="form-control" name="phone">
                  </div>
                  <input type="hidden" name='subtotal' value="<?php echo $totalAmount; ?>">
                  <button type="submit" name="checkout" class="btn btn-primary btn-block btn-lg">Comfirm</button>       
                </form>
                            
                  <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                    <a href="menudetails.php"><i class="fas fa-angle-left me-2"></i>Continuous Shopping</a>
                        &nbsp;
                        &nbsp;
                    <a href="cancel_cart.php" class="text-danger">
                        <!-- <i class="glyphicon glyphicon-remove-circle"></i>Cancel -->
                    </a>
                  </h5>


              </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
<script src="js/jquery-3.7.0.min.js"></script>
<script src="js/order_cart.js"></script>

</body>
</html>