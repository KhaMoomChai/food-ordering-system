<?php
include_once __DIR__. "/../controller/orderController.php";

$start_date=$_POST['start'];
$end_date=$_POST['end'];
// var_dump($start_date);

$order_controller=new OrderController();
$result=$order_controller->reportDate($start_date,$end_date);
?>

<table class="table table-striped">
    <thead>
		<tr>
            <th>No</th>
            <th>Name</th>
            <th>Amount</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$count=1;
            // $month=["Jan","Feb","March","Apr","May","June","July","August","Sep","Oct","Nov","Dec"];
			foreach($result as $item)
			{
				echo "<tr>";
				echo "<td>" .$count++."</td>";
                echo "<td>" . $item['product_name'] ."</td>";
                echo "<td>" . $item['amount'] ."</td>";
				echo "</tr>";
			}
		?>
	</tbody>								
</table>


