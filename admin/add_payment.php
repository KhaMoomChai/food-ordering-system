<?php 
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__. '/../controller/paymentController.php';

$payment_controller=new PaymentController();
if(isset($_POST['submit']))
{
	$payment_type=$_POST['payment_type'];
    $status=$payment_controller->addPayment($payment_type);
    // var_dump($status);
    if($status)
    {
        echo '<script> location.href="payments.php?status='.$status.'"</script>';
    }
}
?>

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-md-12">
							<form action="" method="post">
								<div>
									<label for="" class="form-label">Payment Type</label>
									<input type="text" name="payment_type" class="form-control">
								</div>

								<div class="mt-3">
									<button class="btn btn-dark" name="submit">Add</button>
								</div>
							</form>
						</div>
					</div>

				</div>
</main>

<?php 
include_once __DIR__. '/../layouts/app_footer.php';
?>