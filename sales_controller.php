<?php

	/**
	 * 
	 */
	class Sales 
	{
		function Sales_List()
		{
			$con = new PDO("mysql:host=localhost;dbname=usamadb",'root','123');
			$select = $con->query("SELECT * FROM Sales");
			return $select;
		}
		
		function Add_Sales($name,$price,$qty)
		{
			if($name != null)
			{
				$con = new PDO("mysql:host=localhost;dbname=usamadb",'root','123');
				$add_sale = $con->prepare("INSERT INTO `sales`(`Name`, `Price`, `Quantity`,`Date`) VALUES (?,?,?,?)");
				$datetime = date('m-d-Y')."|".date('H:i:s');
				$add_sale->execute([$name,$price,$qty,$datetime]);
				
			}
		}
		function Update_Sales($id)
		{
			if($id != null)
			{
				echo "Your record is insert";
			}
		}
	}

?>