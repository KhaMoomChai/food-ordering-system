<?php 
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__. '/../controller/paymentController.php';

$payment_controller=new PaymentController();
$payments=$payment_controller->getPayments();
// var_dump($payments);
?>

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Payments</strong> Information</h1>

                    <div class="row my-3">
                        <div class="col-md-12">
                        <?php
                             if(isset($_GET['status']) && $_GET['status']==1)
                             {
                                 echo "<div class='text-success bg-warning'> New Payment is succesfully created </div>";
                             }
                             else if(isset($_GET['update_status']) && $_GET['update_status']==1)                 
                             {
                                 echo "<div class='text-success bg-warning'> Payment is succesfully updated</div>";
                             }

                    ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <a href="add_payment.php" class="btn btn-success">Add New Payment</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Payment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1;
                                            foreach($payments as $payment)
                                            {
                                                echo "<tr >";
                                                echo "<td>".$count++."</td>";
                                                echo "<td>" .$payment['payment_type']."</td>";
                                                echo "<td id='".$payment['id']."'><a class='btn btn-warning mx-3' href='edit_payment.php?id=".$payment['id']."'>Edit </a> <button class='btn btn-danger mx-3 btn3_delete'>Delete </button> </td>";
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