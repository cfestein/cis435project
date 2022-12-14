<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("db.inc");

$query = 'SELECT * FROM Orders JOIN order_product ON Orders.order_num = order_product.order_id JOIN Products ON order_product.product_id = Products.product_id';
$statement1 = $db->prepare($query);
$statement1->execute();

$products = $statement1->fetchAll();
$statement1->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- JQuery -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Add Button Script -->
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $("button").click(function(e) {
                e.preventDefault();
                var btnClass = $(this).attr('id');
                if (btnClass == "complete") {
                    var order_temp = $('input[name="order'+$(this).val()+'"]').val();
                    var email_temp = $('input[name="email'+$(this).val()+'"]').val();
                    var name_temp = $('input[name="name'+$(this).val()+'"]').val();
                    $.ajax({
                        type: "POST",
                        url: "order_complete.php",
                        data: {
                            product_id: $(this).val(),
                            order_num: order_temp,
                            email: email_temp,
                            name: name_temp
                        },
                        success: function(result) {
                            //alert(email_temp);
                        },
                        error: function(result) {
                            alert('error');
                        }
                    })
                }
                $(document).ajaxStop(function(){
                  window.location.reload();
                });  
            });
        });
    </script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>McKinley Café Online</title>
    <link rel="icon" type="image/M-icon" href="images/favicon.ico" />

    <!-- JQuery -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>

<body class="container">
    <!-- NavBar -->
    <header>
        <div id="navbar" class="navbar navbar-light bg-light shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="images/logo.png" alt="McKinley-Cafe-Online" />
                </a>

                <ul class="nav col-md-4 align-items-center justify-content-center mb-3 mb-md-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link px-2 text-muted">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#hours" class="nav-link px-2 text-muted">Hours</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact-us.php" class="nav-link px-2 text-muted">Contact Us</a>
                    </li>
                </ul>

                <button class="btn btn-lg btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href='shopping-cart.php'">
                    <i class="bi bi-cart-fill"> </i>Cart
                </button>
            </div>
        </div>
    </header>
    <!-- NavBar End -->
    <?php foreach ($products as $product) { ?>
        <div class="bg-light p-5 rounded mt-2 mb-2 justify-content-center">
            <h3>Order: <?= $product['order_num'] ?> | <?= $product['cust_name'] ?> | <?= $product['contact'] ?></h3>
            <h5>Pick-up Time: <?= $product['est_time'] ?></h5>
            <?php $subtotal = $product['amount'] * $product['price']; ?>
            <h5 class="ms-5">Quantity: <?= $product['amount'] ?> - <?= $product['product_name'] ?> @ $ <?= number_format((float)$product['price'], 2, '.', '') ?> = $ <?= number_format((float)$subtotal, 2, '.', '')  ?></h5>
            <p class="ms-5"><?= $product['description'] ?></p>
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="submit" class="btn btn-sm btn-primary" value="<?= $product['product_id'] ?>" id="complete">Complete</button>
                    <form id="form" method="POST">
                        <input type="hidden" name="email<?= $product['product_id'] ?>" value="<?= $product['contact'] ?>">
                        <input type="hidden" name="order<?= $product['product_id'] ?>" value="<?= $product['order_num'] ?>">
                        <input type="hidden" name="name<?= $product['product_id'] ?>" value="<?= $product['product_name'] ?>">
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

</html>