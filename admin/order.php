<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/orderController.php';

$order_con=new OrderController();
$orders=$order_con->getOrder();

?>
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Order Lists</strong> Information</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            <th>Delivery</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1;
                                            foreach($orders as $order)
                                            {
                                                echo "<tr >";
                                                echo "<td>".$count++."</td>";
                                                echo "<td>" .$order['id']."</td>";
                                                echo "<td>" .$order['uname']."</td>";
                                                echo "<td>" .$order['email']."</td>";
                                                echo "<td>" .$order['address']."</td>";
                                                echo "<td>" .date("D(d) m/Y h:i A", strtotime($order['date']))."</td>";
                                                echo "<td><a class='btn btn-info mx-3' href='order_details.php?id=".$order['id']."'>Details </a></td>";
                                                echo "<td>";
                                                if($order['delivery_status']==0){?>
                                                    <a class="text-warning"><i class="bi bi-exclamation-diamond-fill"></i><strong>Waiting for Delivery.</strong></a><br>
                                                    <a href="delivered.php?id=<?php echo $order['id']?>" class="btn btn-info">Delivered</a>

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
			</main>


<?php 
include_once __DIR__. '/../layouts/app_footer.php';
?>