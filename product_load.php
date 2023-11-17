<?php
include_once __DIR__ . '/vendor/db/db.php';

$categoryId = $_POST['categoryId'];
// echo $categoryId;

$con = Database::connect();
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM product WHERE cat_id=$categoryId";

$statement = $con->prepare($sql);
if ($statement->execute()) {
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
}


foreach ($result as $item) {
    // echo $item['image'];
?>

    <div class="col-lg-6">
        <div class="d-flex align-items-center">

            <img class="flex-shrink-0 img-fluid rounded" src="uploads/<?php echo $item['image'] ?>" alt="" style="width: 80px; height: 100px;">

            <div class="w-100 d-flex flex-column text-start ps-4">
                
                <h5 class="d-flex justify-content-between border-bottom pb-2">
                    <span><?php echo $item['name'] ?></span>
                    <span class="text-primary"><?php echo $item['price'] ?></span>
                </h5>
                <small class="fst-italic"><?php echo $item['description'] ?></small>
            </div>
        </div>
    </div>
<?php
}
?>