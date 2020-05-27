
<?php
session_start();

require_once("db.php");

include "component.php";

$db = new createDB;
include "header.php"; 

if(isset($_POST['remove'])){
	
	if($_GET['action'] == 'remove'){

	foreach ($_SESSION['cart'] as $key => $value){
	if($value['product_id'] == $_GET['id']){
	unset($_SESSION['cart'][$key]);
	echo "<script> alert('Product as been removed!...')</script>";
	echo "<script>window.location=\"cart.php\"</script>";
}
}

}

}



?>


<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

	<title>Cart</title>
</head>
<body>

	<div class="container-fluid">
		<div class="row px-5">
			<div class="col-md-7">
				<div class="shopping-cart">
					<h5>My cart</h5>
					<hr>
					<?php

							$total = 0;
					if(isset($_SESSION['cart'])){
							$product_id = array_column($_SESSION['cart'],"product_id");
							$result = $db->getData();

							while($row = mysqli_fetch_assoc($result)){

							foreach ($product_id as $id){
							if($row['id'] == $id){

							cartElement($row['p_name'],$row['p_image'],"$".$row['p_rice'],$row['id']);
							$total = $total + (int)$row['p_rice'];

						}
						}
						}
					}
					
					else{

							echo "<h5>Cart is Empty</h5>";
						}
					
					if(!count($_SESSION['cart'])){

							echo "<h5>Cart is Empty</h5>";
						}else{

					}

							?>
					
					
				</div>
				
			</div> 

			<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-28">
			  <div class="pt-5">
				
				<h5>PRICE DETAILS</h5>
				<hr>
				<div class="row price-details">
					<div class="col-md-6">
						<?php 

						if(isset($_SESSION['cart'])){

						$count = count($_SESSION['cart']);
						echo "<h6>Price for ($count Items)</h6>";

					}else{
						echo "<h6>Price for (0 Items)</h6>";

				}

				?>
				<h6>Dilivery Charges</h6>
				<hr>
				<h6>Amount Payable</h6>
				
					</div>
					<div class="col-md-6">
						<h6>$<?php  echo $total;	?></h6>
						<h6 class="text-success">FREE</h6>
						<hr>
						<h6>$<?php echo $total; ?></h6>
					</div>
				</div>
					
			 </div>
				
			</div>
			
		</div>
		
	</div>



	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>