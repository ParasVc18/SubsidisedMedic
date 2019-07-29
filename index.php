<!DOCTYPE html>
<html>
<head>
	<title>MEDIC PROTOTYPE</title>
	<meta charset="utf-8">
	<meta name="developers" content="Viresh Gupta and Aayush Aggarwal">
	<meta name="keywords" content="Medicine, Sponsor, Money, Prototype">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<section class="header">
			<div class="header-top">
				<p><b>MediCharity</b></p>
				<div class="search">
  					<input type="text" name="search" placeholder="Search by name or brand..">
  					<button class="search-btn"><svg width="15px" height="15px"><path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467" data-reactid="69"></path></svg></button>
				</div>
				<div class="bag">
					<button class="bag-btn"><img src="images/bag.png"> My Cart</button>
				</div>
				<div class="login">
					<button class="login-btn">Login</button>
				</div>
			</div>
		</section>
		<div class="nav">
			<h2>Refine results</h2>
			<h4>Filter by brand:</h4>
			<input type="checkbox" name="brand1" value="Lupin"> Lupin<br><br>
			<input type="checkbox" name="brand2" value="Ranbaxy"> Ranbaxy<br><br>
			<input type="checkbox" name="brand3" value="brand3"> Brand 3<br><br><br>
			<h4>Filter by purpose:</h4>
			<input type="checkbox" name="brand1" value="cold"> Cold<br><br>
			<input type="checkbox" name="brand2" value="fever"> Fever<br><br>
			<input type="checkbox" name="brand3" value="headache"> Headache<br><br>
			<input type="checkbox" name="brand3" value="cancer"> Cancer<br><br><br>
			</div>
			<div class="vline"></div>
			<div class="product">
				<?php
				include('config.php');
				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				//connection suceeded. now Proceed.
				$dir = "./*";

				$sql = "use test;";
				$result = mysqli_query($conn, $sql);
				$sql = "select * from Products;";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
				    // output data of each row
				    while($row = mysqli_fetch_assoc($result)) {
				    	echo "<div class='prod'>\n";
				        echo "<h3>" . $row["Name"] . "</h3>\n";
				        echo "<img src='images/" . $row["Name"] . ".jpg'>\n<br>";
				        echo "<p> Rs." . $row["Price"] . "</p>\n";
				    //     echo '	<form method="get" action="form.php" >
  						// 		<input type="hidden" name="pid" value="' . $row["PId"] . '">
  						// 			<button type="submit" name="pid" value="' . $row["PId"] . '" class="prod-btn"> View </button></div>
								// </form>';
				        echo '	<form method="get" action="form.php">
				        			<input type="hidden" name="pid" value="' . $row["PId"] . '">
   									<button type="submit" class="prod-btn"> View </button>
								</form>';
						echo '</div>';
				    }
				} else {
				    echo "No Products found !";
				}
				mysqli_close($conn);
				?>
	</body>
</html>

