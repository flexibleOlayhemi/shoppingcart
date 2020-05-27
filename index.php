<?php 
session_start();

require_once("db.php");

include "component.php";

$db = new createDB;

if (isset($_POST['add'])){

	if (isset($_SESSION['cart'])){

		$item_array_id = array_column($_SESSION['cart'], "product_id");

			if(in_array($_POST['productid'],$item_array_id)){

				echo "<script> alert('Already added to cart')</script>";
				echo "<script>window.location=\"index.php\"</script>";

			}else{
				$count = count($_SESSION['cart']);
				$item_array = array(

				'product_id' => $_POST['productid']
				);

				$_SESSION['cart'][$count] = $item_array;
				#print_r($_SESSION['cart']);

			}



	} else{

		$item_array = array(

			'product_id' => $_POST['productid']
		);

		$_SESSION['cart'][0] = $item_array;

		#print_r($_SESSION['cart']);
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

	<title>Shopping Home</title>
</head>
<body>

	<?php include "header.php"; ?>
	<div class="container">


		<div class="row text-center py-5">
			
				
				
			<?php 
				$result = $db->getData();
					while ($row = mysqli_fetch_assoc($result)) {
						component($row['p_name'],$row['p_image'],"$".$row['sp_price'],"$".$row['p_rice'],$row['id']);
					}
				
				
				

			 ?>
			
		</div>

		
















		
	</div>



	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>