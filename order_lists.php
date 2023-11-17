<?php 
if(!isset($_SESSION)){ session_start();}
include_once __DIR__.'/layouts/navbar.php';
include_once __DIR__."/controller/customer_orderController.php";
$order=new customer_orderController();
$user_id=$_SESSION['my_login']['id'];
$orderLists=$order->getUserOrder($user_id);
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
        <h1 class="h3 mb-3"><strong>Your Order Lists</strong> Information</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order Id</th>
                                            <th>Delivery Address</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1;
                                            foreach($orderLists as $order)
                                            {
                                                echo "<tr >";
                                                echo "<td>".$count++."</td>";
                                                echo "<td>" .$order['id']."</td>";
                                                echo "<td>" .$order['address']."</td>";
                                                echo "<td>" .date("D(d) m/Y h:i A", strtotime($order['date']))."</td>";
                                                echo "<td><a class='btn btn-info mx-3 text-white' href='user_orderDetails.php?id=".$order['id']."'>View Details </a>";
                                                if($order['delivery_status']==0){?>
                                                    <a class="text-warning"><i class="bi bi-exclamation-diamond-fill"></i><strong>Waiting for Delivery.</strong></a>
                                              <?php }else{ ?>
                                                    <a class="text-success"><i class="bi bi-check-circle-fill"></i><strong>Finished Delivered.</strong></a>
                                            <?php }
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                            </table>
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