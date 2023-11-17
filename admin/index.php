<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__.'/../controller/productController.php';
include_once __DIR__.'/../controller/deliveryfeeController.php';
include_once __DIR__.'/../controller/categoryController.php';
include_once __DIR__.'/../controller/orderController.php';

$product_con=new ProductController();
$products=$product_con->getProduct();

$delifee_con=new DeliveryfeeController();
$delifees=$delifee_con->getdelifee();

$category_con=new CategoryController();
$categories=$category_con->getCategories();

$order_con=new OrderController();
$orders=$order_con->getOrder();

$month_order=$order_con->monthlyOrder();


?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Products</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo sizeof($products); ?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Delivery Fees</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo sizeof($delifees); ?></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Category</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo sizeof($categories); ?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Orders</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo sizeof($orders); ?></h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Movement</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div> -->
					</div>

					<div class="row">
                        <div class="col-md-3">
                            <select name="year" id="year" class="form-select">
                                <?php
                                for($index=2003;$index<=2030;$index++)
                                {
                                    echo "<option value='$index'>".$index."</option>";
                                }

                                ?>
                            </select>
                        </div>
						<div class="col-md-3">
                            <select name="month" id="month" class="form-select">
                                <?php
                                for($index=1;$index<=12;$index++)
                                {
                                    echo "<option value='$index'>".$index."</option>";
                                }

                                ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <button class="btn btn-primary btn-search">Search</button>
                        </div>
                    </div>

					<div class="row">
                        <div class="col-md-6 reportor">
                        </div>
                    </div>

					<div class="row mt-3">
						<div class="col-md-3">
                            <label for="" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control">
                        </div>
						<div class="col-md-3">
                            <label for="" class="form-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control">
                        </div>

                        <div class="col-md-6 mt-4">
                            <button class="btn btn-primary mt-1 search">Search</button>
                        </div>
                    </div>

					<div class="row">
                        <div class="col-md-6 reports">
                        </div>
                    </div>

					<div class="row mt-3">
						<div class="col-12 col-lg-12 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Orders</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>No</th>
											<th class="d-none d-xl-table-cell">Order Qty</th>
											<th class="d-none d-xl-table-cell">Month</th>
											<th class="d-none d-xl-table-cell">Year</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$count=1;

											foreach($month_order as $order)
											{
												echo "<tr>";
												echo "<td>". $count++ ."</td>";
												echo "<td>". $order['id'] ."</td>";
												echo "<td>". $order['month'] ."</td>";
												echo "<td>". $order['year'] ."</td>";
												echo "</tr>";
											}
									?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- <div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div> -->
					</div>

					
				</div>
			</main>

<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>

			