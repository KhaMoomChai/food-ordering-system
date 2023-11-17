<?php
if(!isset($_SESSION)){ session_start();}

include_once __DIR__.'/layouts/navbar.php';
include_once __DIR__.'/controller/feedbackController.php';
$feedback_con=new feedbackController();
$feedbacks=$feedback_con->getFeedback();

if(isset($_SESSION['my_login'])){
    $user_id=$_SESSION['my_login']['id'];
    $haveOrder=$feedback_con->checkOrder($user_id);
}


?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Feedback</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Feedback</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->
<?php
$feed_con=new feedbackController();
if(isset($_POST['submit'])) 
{
    $email = $_SESSION['my_login']['email'];
    $fb = $_POST['feedback'];
    $status=$feed_con->addFeedback($email,$fb);
    if($status)
    {
        echo '<div class="alert alert-success" role="alert">
        Thanks For giving Feedback!
      </div>';
    }

}

?>
<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
            <h1 class="mb-5">Customer Feedback!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <?php
                foreach($feedbacks as $feedback){
            ?>
                <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p><?php echo $feedback['feedback']?></p>
                <div class="d-flex align-items-center">
                <i class="bi-person-circle" ></i>
                    <!-- <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;"> -->
                    <div class="ps-3">
                        <h5 class="mb-1"><?php echo $feedback['email']?></h5>
                    </div>
                </div>
            </div>
            <?php
            }    
            ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->
<?php if(isset($_SESSION['my_login']) && $haveOrder){ ?>
<div class="col-12">
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <h1>Please Enter your Feedback</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Enter Your Feedback</label>
                    <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" name="submit">Send Feedback</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php }?>

</div>  
</div>
</div>
<!-- Contact End -->
<?php
include_once 'layouts/footer.php';
?>