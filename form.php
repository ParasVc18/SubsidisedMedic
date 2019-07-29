<?php
	if($_GET["pid"]) {
		include ('config.php');
		$sql = "select * from Products where PId = " . $_GET["pid"] . ";";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if($row == null){
			die("Invalid Product !" . mysqli_connect_error());
		}
		echo "Product ID : " . $row["PId"] . "<br>";
		echo "Product Name : " . $row["Name"] . "<br>";
		echo "Product Price : " . $row["Price"] . "<br>";
		echo "Product Stock : " . $row["Stock"] . "<br>";
		echo "<img src='images/" . $row["Name"] . ".jpg'>\n<br>";
	}
	else{
		include("index.php");
	}
?>