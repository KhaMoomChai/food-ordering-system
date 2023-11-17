<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/productController.php';

$product_con=new productController();
$products=$product_con->getProduct();
// var_dump($products);
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Product</strong> Dashboard</h1>
					<?php
                      if(isset($_GET['status'])&& $_GET['status']==1)
                      {
                        echo "<div class='alert alert-success text-success'> New Product has been successfully created</div>";
                      }
                      elseif(isset($_GET['status'])&& $_GET['status']==2)
                      {
                        echo "<div class='alert alert-success text-success'>Product has been successfully updated</div>";
                      }
					  ?>
					<div class="row">
                        <div class="col-md-3">
                            <a href="add_product.php" class="btn btn-success">Add New Product</a>
                        </div>
                    </div> 
                    
					<div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Image</th>
                                        <th>Name</th>
										<th>Price</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=1;
                                    foreach($products as $product)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$count++."</td>";                                       
                                        echo "<td><img src='../uploads/" . $product['image']. "' width='100px' height='100p'></td>";							
                                        echo "<td>".$product['name']."</td>";
                                        echo "<td>".$product['price']."</td>";
										echo "<td>".$product['desp']."</td>";	
                                        echo "<td>".$product['catname']."</td>";
                                        echo "<td id='".$product['id']."'> <a class='btn btn-warning mx-3' href='edit_product.php?id=". $product['id']."'>Edit</a><button class='btn btn-danger mx-3 btn_delete'>Delete</button> </td>";
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

		