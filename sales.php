<?php include('header.php'); ?>
<?php include('navigation.php'); ?>
<?php include('classes/products_controller.php'); ?>



	<div class="container-fluid">
		<div class="card shadow mb-4">
            <div class="card-header py-3">

            	<div class="row">
            		<div class="col-md-4">
            			<div class="m-0 font-weight-bold text-primary"><h3>Sales</h3></div>
            		</div>
            		<div class="col-md-6"></div>
            		<div class="col-md-2" align="center">
            			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addcategory">(+) New</button>
            		</div>

            	</div>
            </div>
			<div class="card-body">
				<table class="table table-bordered" id="categorytable">
					<thead>
						<th>Name</th>
						<th>Price</th>
            <th>Quantity</th>
            <th>Date</th>
					</thead>
					<tbody>
						<?php 

              include('classes/sales_controller.php');
              $sale = new Sales();
              $sales = $sale->Sales_List();

							while($row = $sales->fetch()){
								echo "<tr><td>".$row['Name']."</td><td>".$row['Price']."</td><td>".$row['Quantity']."</td><td>".$row['Date']."</td></tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>




<?php include('footer.php') ?>