<?php include('header.php'); ?>
<?php include('navigation.php'); ?>
<?php include('classes/products_controller.php'); ?>

<?php 

if (isset($_POST['btnsubmit'])) {
	$name = $_POST['name'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];
	
  $add_pro = new Product();
  $add_pro->Add_Product($name,$price,$qty);
     
    echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'delete') {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		  
      $del_product = new Product();
      $del_product->Delete_Product($id);

		}
	}
}


 ?>



	<div class="container-fluid">
		<div class="card shadow mb-4">
            <div class="card-header py-3">

            	<div class="row">
            		<div class="col-md-4">
            			<div class="m-0 font-weight-bold text-primary"><h3>Purchase Product</h3></div>
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
            <th></th>
					</thead>
					<tbody>
						<?php 

              
              $pro = new Product();
              $product = $pro->Product_list();

							while($row = $product->fetch()){
								echo "<tr><td>".$row['Name']."</td><td>".$row['Price']."</td><td>".$row['Quantity']."</td>
								<td><a href='editproduct.php?id=".$row['Id']."' class='btn btn-primary'>Edit</a> |
								 <a href='product.php?action=delete&id=".$row['Id']."' class='btn btn-danger' onclick='ab()'>Delete</a></td></tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


<div id="addcategory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">New Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
      <div class="modal-body">


        <form class="form" method="POST">
            <div class="form-group">        
                <Label>Name</Label>
                <input type="text" class="form-control" name="name" value=''/>
            </div>
            <div class="form-group">        
                <Label>Price</Label>
                <input type="text" class="form-control" name="price" value=''/>
            </div>
            <div class="form-group">        
                <Label>Quantity</Label>
                <input type="text" class="form-control" name="qty" value=''/>
            </div>
            
            <div class="form-group">     
                     
                <input type="submit" class="btn btn-success" name="btnsubmit" id="refcategory" value='Add'/>
            </div>

        </form>
      </div>
      
    </div>
  </div>
</div> 



<?php include('footer.php') ?>