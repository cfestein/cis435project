<?php
session_start();
if(empty($_SESSION['cart'])){
  $_SESSION['cart'] = array();
}
//var_dump($_SESSION['cart']);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$subtotal = 0;
$tax = 0;
$total = 0;
if(!empty($_SESSION['cart'])){
  include_once("db.inc");
  $wherein=empty($whereIn);
  $whereIn = implode(',',$_SESSION['cart']);
  $query = "SELECT * FROM Products WHERE product_id IN ($whereIn)";
  //echo $query;
  $statement1 = $db->prepare($query);
  $statement1->execute();

  $products = $statement1->fetchAll();

  $statement1->closeCursor();
  $subtotal = 0;
  foreach($products as $row){
    $subtotal += $row['price'];
  }
  $subtotal = number_format((float)$subtotal, 2, '.','');
  $tax = $subtotal * 0.06;
  $tax = number_format((float)$tax, 2, '.','');
  $total = $subtotal + $tax;
  $total = number_format((float)$total, 2, '.','');
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Shopping Cart</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/shopping-cart.css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript"  language="javascript">
        $(document).ready(function() {
            $("button").click(function(e) {
                e.preventDefault();
                var btnClass = $(this).attr('class');
                if(btnClass == "btn btn-primary btn-lg btn-block"){
                    $.ajax({
                        type: "POST",
                        url: "cart.php",
                        data: {
                            products: $(this).val() // <- Note: use of 'this' here
                        },
                        success: function(result) {
                            alert('Added to your cart');
                        },
                        error: function(result) {
                            alert('error');
                        }
                    })
                }                
            });
        });
    </script>

  </head>
  <body>
    <!-- NavBar -->
    <header>
      <div class="navbar navbar-light bg-light shadow-sm">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="images/logo.png" alt="McKinley-Cafe-Online" />
          </a>

          <ul
            class="nav col-md-7 align-items-center justify-content-left mb-3 mb-md-0"
          >
            <li class="nav-item">
              <a href="index.php" class="nav-link px-2 fw-bold text-muted"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a href="menu.php" class="nav-link px-2 text-muted">Menu</a>
            </li>
            <li class="nav-item">
              <a href="index.php#hours" class="nav-link px-2 text-muted"
                >Hours</a
              >
            </li>
            <li class="nav-item">
              <a href="contact-us.php" class="nav-link px-2 text-muted"
                >Contact Us</a
              >
            </li>
          </ul>
        </div>
      </div>
    </header>

    <main class="page">
      <section class="shopping-cart dark">
        <div class="container">
          <div class="block-heading">
            <h2>Your Cart</h2>
            <?php 
              $tz = 'America/New_York';
              $timestamp = time();
              $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
              $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
              $dt->add(new DateInterval('PT25M'));

            ?>
            <p>Estimated Pickup Time: <?php echo $dt->format('H:i'); ?></p>
          </div>
          
            <div class="content">
                <div class="row">
                <div class="col-md-12 col-lg-8">
                <?php if(!empty($products)){foreach($products as $row) { ?>
                    <div class="items">
                    <div class="product">
                        <div class="row">
                        <div class="col-md-3">
                            <img
                            class="img-fluid mx-auto d-block image"
                            src="product_images/<?= $row['image']?>"
                            />
                        </div>

                        <div class="col-md-8">
                            <div class="info">
                            <div class="row">
                                <div class="col-md-5 product-name">
                                <div class="product-name">
                                    <a href="#" class="lato-bold-blue-whale-18px"
                                    ><?= $row['product_name']?></a
                                    >
                                    <div class="product-info">
                                    <div>
                                        Description:
                                        <span class="value"
                                        ><?= $row['description']?></span
                                        >
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-4 quantity">
                                <label for="quantity">Quantity:</label>
                                <input
                                    id="quantity"
                                    type="number"
                                    value="1"
                                    class="form-control quantity-input"
                                />
                                </div>

                                <div class="col-md-3 price">
                                <span><p>$<?= $row['price']?> </p></span>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php }}?>
              <div class="col-md-12 col-lg-4">
                <div class="summary">
                  <h3>Summary</h3>
                  <div class="summary-item">
                    <span class="text">Subtotal</span
                    ><span class="price">$<?=$subtotal?></span>
                  </div>
                  <div class="summary-item">
                    <span class="text">Sales Tax</span
                    ><span class="price">$<?=$tax?></span>
                  </div>
                  <div class="summary-item">
                    <span class="text">Total</span
                    ><span class="price">$<?=$total?></span>
                  </div>
                  <button
                    type="button"
                    class="btn btn-primary btn-lg btn-block"
                    value="1"
                  >
                    Checkout
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
