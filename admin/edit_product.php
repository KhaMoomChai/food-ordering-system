<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/productController.php';


$id=$_GET['id'];
$product_controller=new ProductController();
$categories=$product_controller->getCategory();
$product=$product_controller->getProducts($id);



if(isset($_POST['submit']))
{
    if(!empty($_FILES['image']['name'])){
        $filename=$_FILES['image']['name'];
        $filetype=$_FILES['image']['type'];
        $filesize=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];
        $file_extension=explode('.',$filename);
        $actual_extension=end($file_extension);
        $allowed_files=['png','jpg','jpeg','svg','webp'];
        $max_size=500000;
        if(in_array(strtolower($actual_extension),$allowed_files))
        {
            if($filesize>=$max_size)
            {
                $image_error="File size must be less than 5MB";
            }else
            {
                $image=$_FILES['image'];
            }
        }else
        {
            $image_error="File is not allowed";
        }
    }else
    {
        $image_error="Please Fill Your Product's Image!";
    }
    
    if(empty($_POST['name']))
    {
        $name_error="Please Fill Your Product Name!";
    }
    else{
        $name=$_POST['name'];
    }

    if(empty($_POST['price']))
    {
        $price_error="Please Fill Your Product Price!";
    }
    else{
        $price=$_POST['price'];
        
    }
    if(empty($_POST['desp']))
    {
        $desp_error="Please Fill Your Product description!";
    }
    else{
        $desp=$_POST['desp'];
    }
    if(empty($_POST['category']))
    {
        $category_error="Please Fill Your Product Sub Category!";
    }
    else{
        $category=$_POST['category'];
    }


    if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['desp']) || empty($_POST['category']) || empty($_FILES['image']['name']))
    {
        $error=true;
    }
    else
    {
        $image=$_FILES['image'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $desp=$_POST['desp'];
        $category=$_POST['category'];
        // var_dump($image);
        $status=$product_controller->editProduct($id,$image,$name,$price,$desp,$category);
        if($status)
        {
            $message=2;
            echo '<script>location.href="product.php?status='.$status.'"</script>';
        }
    }

}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Product</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class='my-3'>
                                    <label for="" class="form-label">Product Image</label>
                                    <input type="file" name="image" id="" class="form-control">
                                    <?php if(isset($error) && isset($image_error)) echo "<span class='text-danger'>".$image_error."</span>"; ?>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Product Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>">
                                    <?php if(isset($error) && isset($name_error)) echo "<span class='text-danger'>".$name_error."</span>"; ?>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Product Price</label>
                                    <input type="text" name="price" class="form-control" value="<?php echo $product['price']; ?>">
                                    <?php if(isset($error) && isset($price_error)) echo "<span class='text-danger'>".$price_error."</span>"; ?>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Product Desctiption</label>
                                    <input type="text" name="desp" class="form-control" value="<?php echo $product['description']; ?>">
                                    <?php if(isset($error) && isset($desp_error)) echo "<span class='text-danger'>".$desp_error."</span>"; ?>
                                    
                                </div>
                                <div>
                                    <label for="" class="form-label">Product Category</label>
                                    <select name="category" id="" class="form-select" value="<?php if(isset($category)) echo $category; ?>">     
                                    <?php
                                    foreach($categories as $category)
                                    {
                                        if($category['id']==$product['cat_id'])
                                        
                                        echo "<option value=".$category['id']." selected>".$category['name']."</option>";
                                        else 
                                        echo "<option value=".$category['id'].">".$category['name']."</option>";

                                    }
                                    ?>
                                    </select>
                                    <?php if(isset($error) && isset($category_error)) echo "<span class='text-danger'>$category_error</span>"; ?>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-success" name="submit">Add</button>
                                </div>                                     
                            </form>   
                        </div>
                    </div>
                    
				</div>
			</main>

			
<?php
include_once __DIR__. '/../layouts/app_footer.php';
?>

		