<?php
include_once 'layouts/navbar.php';
include_once 'controller/categoryController.php';
include_once 'controller/productController.php';
include_once 'controller/feedbackController.php';
include_once 'controller/customer_orderController.php';
$order=new customer_orderController();
$categories=$order->getCategories();

if(isset($_GET['cat_id'])){
    $products1=$order->getAllProductsByCategory($_GET['cat_id']);
}else{
    $products1=$order->getAllProducts();
}


$feedback_con=new feedbackController();
$feedbacks=$feedback_con->getFeedback();

?>

<!-- Add this script to your HTML file -->



<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <a href="order.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Order Now</a>
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="img/hero.png" alt="">
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->




<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/fos-1.jpg">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/fos-2.jpg" style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/fos-3.jpg">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/fos-4.png">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos erat ipsum et lorem et sit, sed stet lorem sit.</p>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                            <div class="ps-4">
                                <p class="mb-0">Years of</p>
                                <h6 class="text-uppercase mb-0">Experience</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                            <div class="ps-4">
                                <p class="mb-0">Popular</p>
                                <h6 class="text-uppercase mb-0">Master Chefs</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

 <!-- Menu Start -->
 <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                            <h6 class="d-flex align-items-center text-start mx-3 ms-0 pb-3">    
                                <div class="ps-3">  
                                    <a  href="menu.php" class="mt-n1 mb-0">All</a>
                                </div>
                            </h6>
                    </li>
                    <?php
                    foreach($categories as $category){
                    ?>
                    <li class="nav-item">
                        <h6 class="category d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill"> 
                            <div class="ps-3">  
                                <a class="mt-n1 mb-0" href="index.php?cat_id=<?php echo $category['id']?>"><?php echo $category['name'];?></a>
                            </div>
                        </h6>
                    </li>
                    <?php } ?>
                    </ul>

                    <div class="tab-content">                    
                        <div class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php 
                                foreach($products1 as $p){
                                ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="uploads/<?php echo $p['image'];?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $p['name'];?></span>
                                                <span class="text-primary"><?php echo $p['price'];?></span>
                                            </h5>
                                            <div class="ms-auto">
                                                <span><a href="add_to_cart.php?id=<?php echo $p['id'];?>" class="add-cart cart1 btn btn-primary">Add to cart</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

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
<?php
include_once 'layouts/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.category-link').click(function() {
            var categoryId = $(this).data('category-id');
            console.log('Clicked category ID:', categoryId);

            $.ajax({
                type: "POST",
                url: "product_load.php",
                data: {
                    categoryId: categoryId
                },
                success: function(pdata) {
                    $('#products').html(pdata)
                }
            });
        });
    });
</script>