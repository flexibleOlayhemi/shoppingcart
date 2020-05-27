
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        <h3 class="px-5">
          <i class="fa fa-shopping-basket"></i> Shopping Cart
        </h3>

        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav ml-auto">


            <a class="nav-item nav-link" href="cart.php">
                <h5 class="px-5">
                 <i class="fa fa-shopping-cart"></i> Cart
                 <?php 
                  if (isset($_SESSION['cart'])) {

                    $count = count($_SESSION['cart']);

                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                  }else
                  {
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                  }


                  ?>
                </h5>
            </a>
          
        </div>
      </div>
    </nav>