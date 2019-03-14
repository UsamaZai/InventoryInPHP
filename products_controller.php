<?php

	/**
	 * 
	 */
	class Product 
	{
		
		function Product_list()
		{
			$con = new PDO("mysql:host=localhost;dbname=usamadb",'root','123');
			$p_product = $con->query("SELECT * FROM `purchaseproducts`");
			return $p_product;
		}
		function Product_list_Id($id)
		{
			$con = new PDO("mysql:host=localhost;dbname=usamadb",'root','123');
			$p_product = $con->query("SELECT * FROM `purchaseproducts` WHERE Id=".$id);
			return $p_product;
		}
		
		function Add_Product($name,$price,$qty)
		{
			$id = 10;
			$con = new PDO("mysql:host=localhost;dbname=usamadb",'root','123');

			if($name != null)
			{
				$p_product = $con->query("SELECT * FROM `purchaseproducts` WHERE Id=".$id);
				$count = $p_product->fetch();

				if ($count['Name'] == $name) {
					$u_product = $con->query("UPDATE `purchaseproducts` SET`Quantity`=".$qty." WHERE Name=".$name);

				}
				else
				{
					$add_product = $con->prepare("INSERT INTO purchaseproducts(`Name`,`Price`,`Quantity`) VALUES(?,?,?)");
					$add_product->execute([$name,$price,$qty]);
					echo "Your record is insert";
				}
			}
			else{
				echo "Your record has not insert";
			}
			
		}
		function Update_Product($id,$qty)
		{
			if($id != null && $qty != null)
			{
				$con = new PDO("mysql:host=localhost;dbname=usamadb",'root','123');

				$p_product = $con->query("SELECT * FROM `purchaseproducts` WHERE Id=".$id);
				$count = $p_product->fetch();
				
				$result = $count['Quantity'] - $qty;

				$u_product = $con->query("UPDATE `purchaseproducts` SET`Quantity`=".$result." WHERE Id=".$id);

				return "Your record has been updated";
			}
			else{
				return "Not";
			}
			
		}
		function Delete_Product($id)
		{
			if($id != null)
			{
				$con = new PDO("mysql:host=localhost;dbname=usamadb",'root','123');
				$con->exec("DELETE FROM `purchaseproducts` WHERE Id=$id");
				echo "Your record is delete";
			}
			else
			{
				echo "Record not delete";
			}
		}
	}

?>