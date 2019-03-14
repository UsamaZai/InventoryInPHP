<?php include('header.php'); ?>
<?php include('navigation.php'); ?>

<?php 

$take = "";

$con = new PDO("mysql:host=localhost;dbname=usamadb",'root','123');
$category = $con->query("SELECT * FROM Categories");

if (isset($_POST['btnsubmit'])) {
	$name = $_POST['name'];
	$add_category = $con->prepare("INSERT INTO Categories(`Name`) VALUES(?)");

     $add_category->execute([$name]);
    echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'delete') {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			//$del_category = $con->query("DELETE FROM Categories WHERE Id=".$id);
			$con->exec("DELETE FROM Categories WHERE Id=$id");

		}
	}
}





		
		

 ?>



	<div class="container-fluid">
		<div class="card shadow mb-4">
            <div class="card-header py-3">

            	<div class="row">
            		<div class="col-md-2">
            			<div class="m-0 font-weight-bold text-primary"><h3>Categories</h3></div>
            		</div>
            		<div class="col-md-8"></div>
            		<div class="col-md-2" align="center">
            			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addcategory">(+) New</button>
            		</div>

            	</div>
            </div>
			<div class="card-body">
				<table class="table table-bordered" id="categorytable">
					<thead>
						<th>Name</th>
						<th>Actions</th>
					</thead>
					<tbody>
						<?php 

							while($row = $category->fetch()){
								echo "<tr><td>".$row['Name']."</td>
								<td><a href='category.php?e_id=".$row['Id']."' class='btn btn-primary' data-toggle='modal' data-target='#editcategory'>Edit</a> |
								 <a href='category.php?action=delete&id=".$row['Id']."' class='btn btn-danger' onclick='ab()'>Delete</a></td></tr>";
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
                     
                <input type="submit" class="btn btn-success" name="btnsubmit" id="refcategory" value='Add'/>
            </div>

        </form>
      </div>
      
    </div>
  </div>
</div> 



<div id="editcategory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">Edit Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
      <div class="modal-body">


        <form class="form" method="POST">
            <div class="form-group">        
                <Label>Name</Label>
                <input type="hidden" class="form-control" value=""/>
<?php

                if (isset($_POST['e_id']) > 0) {
                  $id = $_POST['e_id'];
                  //$del_category = $con->query("DELETE FROM Categories WHERE Id=".$id);
                  $caterow = $con->query("SELECT * FROM Categories WHERE Id='".$id."'");

                  $take = $caterow->fetch();
                  
                  $name = $take['Name'];
                ?>
                <input type="text" class="form-control" value="<?php echo $id; ?>"/>
            <?php
}else{
            ?>
            <input type="text" class="form-control" value=""/>
            <?php
}
            ?>
            </div>
            
            <div class="form-group">     
                     
                <input type="submit" class="btn btn-success" name="" id="refcategory" value='Edit'/>
            </div>

        </form>
      </div>
      
    </div>
  </div>
</div> 



<?php include('footer.php') ?>