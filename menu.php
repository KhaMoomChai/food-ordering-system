<?php
include_once 'layouts/navbar.php';
include_once 'controller/categoryController.php';
include_once 'controller/productController.php';
include_once 'controller/customer_orderController.php';

$order=new customer_orderController();
$categories=$order->getCategories();

if(isset($_GET['cat_id'])){
    $products1=$order->getAllProductsByCategory($_GET['cat_id']);
}else{
    $products1=$order->getAllProducts();
}


?>

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
                                <a class="mt-n1 mb-0" href="menu.php?cat_id=<?php echo $category['id']?>"><?php echo $category['name'];?></a>
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

<?php
include_once 'layouts/footer.php'
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