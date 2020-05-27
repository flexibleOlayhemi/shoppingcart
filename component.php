<?php 

function component($productname,$productimage,$productslashprice,$productprice,$productid){

	$element = "


<div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
	<form action=\"index.php\" method=\"post\">
					<div class=\"card shadow\">
						<div>
							<img src=\"$productimage\" class=\"img-fluid card-img-top\" alt=\"Item Image\">
						</div>
						<div class=\"card-body\">
							<h5 class=\"card-title\">$productname</h5>
							<h6>
								<i class=\"fa fa-star\"></i>
								<i class=\"fa fa-star\"></i>
								<i class=\"fa fa-star\"></i>
								<i class=\"fa fa-star\"></i>
								<i class=\"fa fa-star\"></i>
								

							</h6>
							<p>
								Laptop computer with full warranty.
							</p>
							<h5>
								<small><s class=\"text-secondary\">$productslashprice</s></small>
								<span class=\"price\">$productprice</span>
							</h5>
							<button class=\"btn btn-warning py-2\" type=\"submit\" name=\"add\">Add to Cart <i class=\"fa fa-shopping-cart\"></i></button>
							<input type=\"hidden\" name=\"productid\" value=\"$productid\">
							
						</div>
						
					</div>

					
				</form>
			</div>


	";

	echo $element;
}



function cartElement($productname,$productimage,$productprice,$productid){

	$element = "
<form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"card-item\">
						<div class=\"border rounded\">
							<div class=\"row bg-white\">
								<div class=\"col-md-3\">
									<img src=\"$productimage\" alt=\"Product Image\">
									
								</div>
								<div class=\"col-md-6\">
									<h5 class=\"pt-2\">$productname</h5>
									<small class=\"text-secondary\">Seller : FLexible
									</small>	
									<h5 class=\"pt-2\">$productprice</h5>
									<button type=\"submit\" class=\"btn-warning\" name=\"\">Add for later</button>
									<button type=\"submit\" class=\"btn-danger\" name=\"remove\"> Remove</button>

								</div>
								<div class=\"col-md-3 py-5\">
									<div>
										<button type=\"button\" class=\"btn bg-white border rounded-circle\"><i class=\"fa fa-minus\"></i></button>
											<input type=\"text\" value=\"1\" class=\"form-control d-inline\">
										<button type=\"button\" class=\"btn bg-white border rounded-circle\"><i class=\"fa fa-plus\"></i></button>
										
									</div>
								</div>
								
							</div>
							
						</div>
						
					</form>

	";

	echo $element;
}




 ?>