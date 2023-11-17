<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/deliveryfeeController.php';


$id=$_GET['id'];
$delifee_controller=new DeliveryfeeController();
$delifee=$delifee_controller->getDelifees($id);

if(isset($_POST['submit']))
{
    if(empty($_POST['city']))
    {
        $city_error="Please Fill Your Product City!";
    }
    else{
        $city=$_POST['city'];
    }

    if(empty($_POST['fee']))
    {
        $fee_error="Please Fill Your Product Fee!";
    }
    else{
        $fee=$_POST['fee'];
        
    }
    if(empty($_POST['city']) || empty($_POST['fee']))
    {
        $error=true;
    }
    else
    {
        $city=$_POST['city'];
        $fee=$_POST['fee'];
        $status=$delifee_controller->editDelifee($id,$city,$fee);
        if($status)
        {
            $message=2;
            echo '<script>location.href="delivery_fee.php?status='.$status.'"</script>';
        }
    }

}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Delivery Fee</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class='my-3'>
                                    <label for="" class="form-label">Delivery City Name</label>
                                    <input type="text" name="city" class="form-control" value="<?php echo $delifee['city_name']; ?>">
                                    <?php if(isset($error) && isset($city_error)) echo "<span class='text-danger'>".$city_error."</span>"; ?>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Delivery Fee</label>
                                    <input type="text" name="fee" class="form-control" value="<?php echo $delifee['fee']; ?>">
                                    <?php if(isset($error) && isset($fee_error)) echo "<span class='text-danger'>".$fee_error."</span>"; ?>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-success" name="submit">Update</button>
                                </div>                                     
                            </form>   
                        </div>
                    </div>
                    
				</div>
			</main>

			
<?php
include_once __DIR__. '/../layouts/app_footer.php';
?>

		