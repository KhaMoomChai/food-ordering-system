<?php
ob_start();

include_once __DIR__ . '/../layouts/sidebar.php';
include_once __DIR__ . '/../controller/paymentController.php';

$id=$_GET['id'];
var_dump($id);
$payment_controller=new PaymentController();
$payment=$payment_controller->getPayment($id);
// var_dump($payment);


if(isset($_POST['submit']))
{
    $payment_type=$_POST['payment_type'];
    $status=$payment_controller->editPayment($id,$payment_type);
    var_dump($status);
    if($status)
    {
        $message=1;
        echo '<script> location.href="payments.php?status='.$message.'"</script>';
    }
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Payment</strong> Dashboard</h1>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div>
                                        <label for="" class='form-label'>Payment Type</label>
                                        <input type="text" name="payment_type" id="" class='form-control' value="<?php echo $payment['payment_type']; ?>" >
                                    </div>
                                    <div class='mt-3'>
                                        <button class="btn btn-dark" name='submit'>Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>


				</div>
			</main>
?>