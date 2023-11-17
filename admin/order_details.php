<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/orderController.php';

$order_con=new OrderController();
$order_id=$_GET['id'];
$orders=$order_con->getOrderById($order_id);

?>

    <main class="content">
     <div class="container">
        <div class="page-header">
        <h1 class="h3 mb-3"><strong>Order Lists</strong> Information</h1>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">Order ID : <?php echo $order_id;?></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4" style="border-right: 1px solid">
                    <?php 
                    $username='';$email='';$address='';$date='';
                    foreach($orders as $u){
                        $username=$u['uname'];
                        $email=$u['email'];
                        $address=$u['address'];$date=$u['date'];
                     } ?>
                        <p>
                            <i class="glyphicon glyphicon-user"></i> Name : <?php echo $username; ?>
                        </p>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i> Email : <?php echo $email; ?>
                        </p>
                        <p>
                            <i class="glyphicon glyphicon-map-marker"></i> Address : <?php echo $address; ?>
                        </p>
                        <p>
                            <i class="glyphicon glyphicon-calendar"></i> Date :
                            <?php echo date("D(d) m/Y h:i A", strtotime($date));?>
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
                                    ?>
                                <?php foreach($orders as $o){ ?>
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
	</main>


<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>


