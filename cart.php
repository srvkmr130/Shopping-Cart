<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['email'])){
	header('location: index.php');
}
require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
		<meta name="description" content="mobilemobile shopping,mobile gurus,mobile communications,mobile system,handsets">
		<meta name="Author" content="Sanjay kumar mahto">
		<!-- Title Image-->
		<link rel="shortcut icon" href="images/mobile1.png"  class="img-rounded" type="image/png">
		<title>E-mobile shop</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="index.css" type="text/css"/>
		</script>
	</head>
	<body>
		<div class="container-fluid">
			<?php include("navbar-after-login.php"); ?>
			<div class="row" style="margin-top:80px;">
				<div class="col-lg-4 col-lg-offset-4">
					<table class="table table-striped">
						<thead>
							<tr>
							<th>Item Number</th>
							<th>Price</th>
							<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sum=0;
							$query = "SELECT PID, Price FROM items WHERE cart=1";
							$result=mysqli_query($con, $query);
							while($row = mysqli_fetch_array($result)){
								$sum+= $row["Price"];
								$id .= $row["PID"].", ";
								echo "<tr><td>"."#".$row["PID"]."</td><td>".$row["Price"]."</td><td><a href='remove.php?id={$row['PID']}' style='color:#0000ff;'> Remove</a></td></tr>";
							}
							echo "<tr><td>Total</td><td>".$sum."</td><td><a href='success.php?itemsid=".$sum."' class='btn btn-primary'> Confirm</a></td></tr>";
					?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>