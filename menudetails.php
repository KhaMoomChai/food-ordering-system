<?php
include_once __DIR__."/user_auth.php";
include_once __DIR__."/controller/customer_orderController.php";
$order=new customer_orderController();
$categories=$order->getCategories();

if(isset($_GET['cat_id'])){
    $products1=$order->getAllProductsByCategory($_GET['cat_id']);
}else{
    $products1=$order->getAllProducts();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
    
    <?php if(isset($_SESSION['cart'])){?>
    <div class="dashboard">
        <?php }?>
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative py-4">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Eatme</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="feedback.php" class="nav-item nav-link">Feedback</a>
                        <a href="order_lists.php" class="nav-item nav-link">Order Lists</a>
                        <a href="menudetails.php" class="nav-item nav-link">Menu details</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi-person-circle"></i>&nbsp;<?php echo $_SESSION['my_login']['name']?>
                            </a>
                            <div class="dropdown-menu m-0">
                                <a href="setting.php" class="dropdown-item"><i class="bi bi-gear-wide"></i>&nbsp;Account Setting</a>
                            </div>
                        </div>
                        <a href="logout.php" class="nav-item nav-link"><i class="bi-box-arrow-in-right"></i>&nbsp;Logout</a>                        
                    </div>
                </div>
            </nav>
            
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
        <!-- Navbar & Hero End -->

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
                                    <a  href="menudetails.php" class="mt-n1 mb-0">All</a>
                                </div>
                            </h6>
                    </li>
                    <?php
                    foreach($categories as $category){
                    ?>
                    <li class="nav-item">
                        <h6 class="category d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill"> 
                            <div class="ps-3">  
                                <a class="mt-n1 mb-0" href="menudetails.php?cat_id=<?php echo $category['id']?>"><?php echo $category['name'];?></a>
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

       <!-- Footer Start -->
       <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Reservation</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Chanmyatharsi, Mandalay</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+959252646379</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>eatme@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>You can give some advice here</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.--> 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							<!--Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
     </div>
    <?php if(isset($_SESSION['cart'])){?></div><?php }?>
    

    <?php if(isset($_SESSION['cart'])){?>
    <!-- order dashboard -->
    <div class="dashboard-order">
    <?php 
        $totalQty=0;
        if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $id=>$qty){
        $totalQty +=$qty;
            }
         } ?>  
        <h5 class="pt-3"><i class="bi bi-cart4"></i><span>&nbsp;<?php echo $totalQty ?></span><span>&nbsp;item</span></h5>
        <h3>Order Menu</h3>
        
        <div class="order-wrapper">
        <?php
        $totalAmount=0;
        foreach($_SESSION['cart'] as $id=>$qty){
            $products=$order->getPostForCart($id);
         foreach($products as $product){
            $totalAmount+=$product['price']*$qty;
        ?>
            <div class="order-card">
                <img class="order-image" src="uploads/<?php echo $product['image'];?>">
                <div class="order-detail">
                    <p><?php echo $product['name'];?></p>
                    <p><?php echo $product['price'];?></p>
                    <!-- <i class="fas fa-times"></i><input type="text" value="1"> -->
                    <div class="product-quantity pe-3">
                        <a href="decrease_cart.php?id=<?php echo $product['id']; ?>"><i class="fa fa-minus" aria-hidden="true"></i> </a>
                        <?php echo $qty; ?>
                        <a href="increase_cart.php?id=<?php echo $product['id']; ?>"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <h5 class="order-price"><?php echo $product['price']*$qty;?></h5>
            </div>
        <?php } }?>
        </div>

        <hr class="divider">
        <div class="order-total">
            <p>Subtotal<span><?php echo $totalAmount; ?></span></p>
        </div>
        
        <form action="order_cart.php" method="POST">
        <button class="checkout" name="order">
            Order
        </button>
        </form>
        
    </div> 
    <?php } ?>
 
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/tab.js"></script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <!-- <script src="js/cart.js"></script>  -->
    <script src="js/main.js"></script>
</body>
</html>