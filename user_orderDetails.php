<?php 
if(!isset($_SESSION)){ session_start();}
include_once __DIR__.'/layouts/navbar.php';
include_once __DIR__."/controller/customer_orderController.php";
$order=new customer_orderController();
$user_id=$_SESSION['my_login']['id'];
$order_id=$_GET['id'];
$orderLists=$order->getUserOrderListById($user_id,$order_id);
$orders=$order->getUserOrderListById($user_id,$order_id);
?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Order Lists</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Order Lists</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->
<?php

?>

<div class="col-12">
    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
        <h1 class="h3 mb-3"><strong>Order Lists</strong> Information</h1>
        <div class="panel panel-default">
            <div class="panel-heading">Order ID : <?php echo $order_id;?></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4" style="border-right: 1px solid">
                    <?php 
                    $username='';$email='';$address='';$date='';
                    foreach($orderLists as $u){

                        $address=$u['address'];$date=$u['date'];
                     } ?>
                        <p>
                            <i class="glyphicon glyphicon-map-marker"></i> Address : <?php echo $address; ?>
                        </p>
                        <p>
                            <i class="glyphicon glyphicon-calendar"></i> Date : <?php echo date("D(d) m/Y h:i A", strtotime($date));?>
                        </p>
                    
                    </div>
                    <div class="col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>

                                <?php
                                $totalAmount=0;$delivery_fee=0;$grand_total=0;                                   
                                foreach($orders as $o){ ?>
                                    <tr>                               
                                        <td><?php echo $o['product_name']; ?></td>
                                        <td><?php echo $o['price']; ?></td>
                                        <td><?php echo $o['qty']; ?></td>
                                        <td><?php echo  $o['price']*$o['qty'];?></td>
                                    </tr>
                                    <?php
                                    $totalAmount+=($o['price']*$o['qty']);
                                    $delivery_fee=$o['delivery_fee'];
                                    $grand_total=$o['total'];
                                ?>
                                <?php } ?>
                                <tr>
                                    <td colspan="3" class="text-right">Total Amount</td>
                                    <td><?php echo $totalAmount; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right">Delivery Fee</td>
                                    <td><?php echo $delivery_fee;?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right">Grand Total Amount</td>
                                    <td><?php echo $grand_total;?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Testimonial End -->
</div>
</div>
</div>
</div>
<!-- Contact End -->
<?php
include_once 'layouts/footer.php';
?>