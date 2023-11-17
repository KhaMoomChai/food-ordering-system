<?php
if(!isset($_SESSION)){ session_start();}
include_once __DIR__."/controller/customer_orderController.php";
$order=new customer_orderController();
if(empty($_SESSION['order'])){
    header('location: order_cart.php');

}else{
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


</head>
<body>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-6 ">
            <div class="card shopping-cart" style="border-radius: 15px;">
                <div class="card-body text-black">
                 <h4 class="mb-4 pt-2 text-center fw-bold ">Your Order</h4>
                 <div class="container">
                    <div class="row">
                      <?php 
                          $id=$_SESSION['my_login']['id'];
                          $user=$order->getUser($id);
                      ?>
                      <ul class="list-unstyled">
                      <?php
                      foreach($user as $u){ ?>
                          <li class="text-black"><i class="bi bi-person-fill"></i>&nbsp;<?php echo $u['name'];?></li>
                          <li class="text-black mt-1"><i class="bi bi-envelope-fill"></i>&nbsp;<?php echo $u['email'];?></li>
                      <?php }
                          $address=$order->getDeliveryFeeById($_SESSION['order']['delivery_fee_id']);
                      foreach($address as $a){?>
                          <li class="text-black mt-1"><i class="bi bi-geo-alt-fill"></i>&nbsp;<?php echo $a['city_name']; ?></li>
                          <li class="text-black mt-1"><i class="bi bi-telephone-fill"></i>&nbsp;<?php echo $_SESSION['order']['phone']; ?></li>
                     <?php }?>
                      </ul>
                      <hr>
                      <div class="col-xl-10">
                        <p>Subtotal</p>
                      </div>
                      <div class="col-xl-2">
                        <p class="float-end"><?php echo $_SESSION['order']['subtotal']; ?>
                        </p>
                      </div>
                      <hr>
                    </div>
                    <div class="row">
                      <div class="col-xl-10">
                        <p>Delivery Fee</p>
                      </div>
                      <div class="col-xl-2">
                        <p class="float-end"><?php echo $_SESSION['order']['delivery_fee'];?>
                        </p>
                      </div>
                    </div>
      
                    <hr style="border: 2px solid black;">
                    <div class="row text-black">
                      <div class="col-xl-10">
                        <h4>Total Amount</h4>
                      </div>
                      <div class="col-xl-2">
                        <h4 class="float-end"><?php echo $_SESSION['order']['subtotal']+$_SESSION['order']['delivery_fee'] ?>
                      </h4>
                      </div>
                  
                    </div>
                      <hr style="border: 2px solid black;">
                    </div>
                    <form method="post" action="checkout.php" class="p-4">
                      <button type="submit" name="payment" class="btn btn-primary btn-block btn-lg">Comfirm</button>       
                      <a href="cancel_cart.php" class="btn btn-danger btn-block btn-lg">Cancel</a>       
                      </form>
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

<?php
}
?>