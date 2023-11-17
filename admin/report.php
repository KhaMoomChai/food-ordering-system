<?php
include_once __DIR__. "/../controller/orderController.php";

$year=$_POST['year'];
$month=$_POST['month'];
// var_dump($month);
$order_controller=new OrderController();

$result=$order_controller->reportOrder($year,$month);
if($result){
$m=intval($result['month']);
$name=$result['name'];
$qty=intval($result['quantity']);
}else{
  $message="No results";
}
// var_dump($result);
?>
<?php if($result){ ?>
  <table class="table table-striped">
    <thead>
        <tr><th>No</th>
        <th>Month</th>
        <th>Name</th>
        <th>Qty</th></tr>
    </thead>
    <tbody>
        <?php
        $count=1;
        $month=["Jan","Feb","March","Apr","May","June","July","August","Sep","Oct","Nov","Dec"];
            echo "<tr>";
            echo "<td>" .$count++."</td>";
            echo "<td>" . $month[$m-1] ."</td>";
            echo "<td>" . $name ."</td>";
            echo "<td>" . $qty ."</td>";
            echo "</tr>";

        ?>
    </tbody>
  </table>
  <?php }else{ ?>
    <table class="table table-striped">
    <thead>
        <tr><th>No</th>
        <th>Month</th>
        <th>Name</th>
        <th>Qty</th></tr>
    </thead>
    <tbody>
        <?php
        $count=1;
        $month=["Jan","Feb","March","Apr","May","June","July","August","Sep","Oct","Nov","Dec"];
            echo "<tr>";
            echo "<td colspan=4 class='text-center text-danger'>" .$message. "</td>";
            echo "</tr>";

        ?>
    </tbody>
  </table>
  <?php } ?>



