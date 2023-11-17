<?php
session_start();
include_once 'layouts/navbar.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Ordering</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<style>
    /* Custom styles to center content */
    .center-viewport {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        font-weight: 500;
        background-color: antiquewhite; /* Set minimum height to cover the entire viewport */
    }
</style>
<body>
<div class="center-viewport">
        <div class="text-center">
            <h1>Thank You For Ordering our Foods!</h1>
            <h5>Plase come back if you enjoy it</h5>
            <!-- <a href="index.php" class="btn btn-dark">Home</a> -->
        </div>
    </div>
<?php
include_once 'layouts/footer.php';
?>
<script src="js/jquery-3.7.0.min.js"></script>
<script src="js/order_cart.js"></script>
<script>
    $(function(){
        setTimeout(function () {
            window.location.replace("index.php");
        },3000)
    })
</script>



</body>

</html>


