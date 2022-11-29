<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("db.inc");

$query = 'SELECT * FROM Products';
$statement1 = $db->prepare($query);
$statement1->execute();

$products = $statement1->fetchAll();
$statement1->closeCursor();

$query2 = 'SELECT * FROM Products WHERE category = "specials"';
$statement2 = $db->prepare($query2);
$statement2->execute();

$specials = $statement2->fetchAll();
$statement2->closeCursor();

$query3 = 'SELECT * FROM Products WHERE category = "favorite"';
$statement3 = $db->prepare($query3);
$statement3->execute();

$favorites = $statement3->fetchAll();
$statement3->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>McKinley Café Online</title>
    <link rel="icon" type="image/M-icon" href="images/favicon.ico" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Add Button Script -->
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $("button").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "http://umd-cis435s1.engin.umd.umich.edu/group9/test.php",
                    data: {
                        product_id: $(this).val() // <- Note: use of 'this' here
                    },
                    success: function(result) {
                        alert('Added to your cart');
                    },
                    error: function(result) {
                        alert('error');
                    }
                })
            });
        });
    </script>
</head>

<body>
    <!-- NavBar -->
    <header>
        <div id="navbar" class="navbar navbar-light bg-light shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="images/logo.png" class="logo" alt="McKinley-Cafe-Online" />
                </a>

                <ul class="nav col-md-4 align-items-center justify-content-center mb-3 mb-md-0">
                    <li class="nav-item">
                        <a href="index.php" id="home_page" class="nav-link px-2 text-muted">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="menu.php" id="menu_page" class="nav-link px-2 text-muted">Menu</a>
                    </li>
                    <li class="nav-item hours">
                        <a href="#hours" id="hours_page" class="nav-link px-2 text-muted">Hours</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact-us.php" id="contact_page" class="nav-link px-2 text-muted">Contact Us</a>
                    </li>
                </ul>

                <button class="btn btn-lg btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href='shopping-cart.php'">
                    <i class="bi bi-cart-fill"> </i>Cart
                </button>
            </div>
        </div>
    </header>
    <!-- NavBar End -->