<?php
include_once __DIR__. "/../layouts/navbar.php";
include_once  __DIR__. '/../controller/categoryController.php';
$cid=$_GET['id'];
$cat_controller=new CategoryController();
$category=$cat_controller->getCategory($cid);

?>

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="card col-md">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="form-label"> Category Name : <?php echo $category['categoryName'];?> </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label"> Sub Category Name : <?php echo $category['sub_cat_name'];?> </label>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div>
                        <a href="categories.php" class='btn btn-success'>Back to Categories</a>
                    </div>

				</div>
</main>	

<?php
include_once __DIR__. "/../layouts/footer.php";
?>