<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/deliveryfeeController.php';

$delifee_con=new DeliveryfeeController();
$delifees=$delifee_con->getdelifee();

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Delivery Fee</strong> Dashboard</h1>
					<?php
                      if(isset($_GET['status'])&& $_GET['status']==1)
                      {
                        echo "<div class='alert alert-success text-success'> New Delivery Fee has been successfully created</div>";
                      }
                      elseif(isset($_GET['status'])&& $_GET['status']==2)
                      {
                        echo "<div class='alert alert-success text-success'>Delivery Fee has been successfully updated</div>";
                      }
					  ?>
					<div class="row">
                        <div class="col-md-3">
                            <a href="add_delivery_fee.php" class="btn btn-success">Add New Delivery Fee</a>
                        </div>
                    </div> 
                    
					<div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>City Name</th>
										<th>Fee</th>                                       
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=1;
                                    foreach($delifees as $delifee)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$count++."</td>";							
                                        echo "<td>".$delifee['city_name']."</td>";
                                        echo "<td>".$delifee['fee']."</td>";
                                        echo "<td id='".$delifee['id']."'> <a class='btn btn-warning mx-3' href='edit_delivery_fee.php?id=". $delifee['id']."'>Edit</a><button class='btn btn-danger mx-3 btn1_delete'>Delete</button> </td>";
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
include_once __DIR__.'/../layouts/app_footer.php';
?>

		