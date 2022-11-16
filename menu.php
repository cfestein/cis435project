<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("db.inc");

$query = 'SELECT * FROM Products';
$statement1 = $db->prepare($query);
$statement1->execute();

$products = $statement1->fetchAll();
// foreach($products as $product) {
//     print_r($product);
// }
$statement1->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu - McKinley Café Online</title>
    <link rel="icon" type="image/M-icon" href="images/favicon.ico" />

    <!-- JQuery -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Add Button Script -->
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $("button").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "http://umd-cis435s1.engin.umd.umich.edu/group9/test.php",
                    data: {
                        category_id: $(this).val(), // <- Note: use of 'this' here
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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>

<body>
    <!-- NavBar -->
    <header>
        <div id="navbar" class="navbar navbar-light bg-light shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="images/logo.png" alt="McKinley-Cafe-Online" />
                </a>

                <ul class="nav col-md-4 align-items-center justify-content-center mb-3 mb-md-0">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link px-2 text-muted">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 fw-bold active">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html#hours" class="nav-link px-2 text-muted">Hours</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html#contact" class="nav-link px-2 text-muted">Contact Us</a>
                    </li>
                </ul>

                <button class="btn btn-lg btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation" onclick="location.href='../pages/shopping-cart.html'">
                    <i class="bi bi-cart-fill"> </i>Cart
                </button>
            </div>
        </div>
    </header>
    <!-- NavBar End -->
    <main>
        <!-- Jumbotron -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 bground-img" src="images/background/bagel.jpg" alt="First slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <div class="row py-lg-5">
                            <div class="col-lg-12 col-md-8 mx-auto">
                                <h1 class="fw-light lato-light-blue-whale-63px">
                                    Running late, Order ahead.
                                </h1>
                                <p class="lead col-lg-6 mx-auto text-dark">
                                    Choose from a variety of our handmade options. We have you
                                    covered at McKinley Café.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron End -->
    </main>
    <!-- Menu -->
    <section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" height="100" src="product_images/<?= $products[0]["image"] ?>" alt="Chicken-Sandwich" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[0]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[0]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#chicken_sandwichModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[0]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="chicken_sandwichModal" tabindex="-1" aria-labelledby="chicken_sandwichLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="chicken_sandwichLabel">
                                        <?= $products[0]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[0]["image"] ?>" alt="Chicken-Sandwich" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[1]["image"] ?>" alt="falafel" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[1]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[1]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#falafelModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[1]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="falafelModal" tabindex="-1" aria-labelledby="falafelLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="falafelLabel"><?= $products[1]["product_name"] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[1]["image"] ?>" alt="falafel" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[2]["image"] ?>" alt="Apple-Turnover" />

                            <div class="card-body d-flex flex-column">
                                <h4 class="text-center"><?= $products[2]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[2]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary mt-auto" data-bs-toggle="modal" data-bs-target="#apple_turnoverModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary mt-auto">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[2]["price"] ?></small>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="apple_turnoverModal" tabindex="-1" aria-labelledby="apple_turnoverLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="apple_turnoverLabel">
                                                <?= $products[2]["product_name"] ?>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[2]["image"] ?>" alt="apple-turnover" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal End -->
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[3]["image"] ?>" alt="gyro" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[3]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[3]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#gyroModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[3]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="gyroModal" tabindex="-1" aria-labelledby="gyroLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="gyroLabel">
                                        <?= $products[3]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[3]["image"] ?>" alt="gyro" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[4]["image"] ?>" alt="caprese-salad" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[4]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[4]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#capreseModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[4]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="capreseModal" tabindex="-1" aria-labelledby="capreseLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="capreseLabel">
                                        <?= $products[4]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[4]["image"] ?>" alt="caprese-salad" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[5]["image"] ?>" alt="Meatball Pasta" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[5]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[5]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#meatballModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[5]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="meatballModal" tabindex="-1" aria-labelledby="meatballLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="meatballLabel">
                                        <?= $products[5]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[5]["image"] ?>" alt="meatball_pasta" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->

                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[6]["image"] ?>" alt="Roadhouse-Burger" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[6]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[6]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#burgerModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[6]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="burgerModal" tabindex="-1" aria-labelledby="gyroLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="burgerLabel">
                                        <?= $products[6]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[6]["image"] ?>" alt="roadhouse_burger" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[7]["image"] ?>" alt="chicken-fajita" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[7]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[7]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#fajitaModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[7]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="fajitaModal" tabindex="-1" aria-labelledby="fajitaLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="fajitaLabel">
                                        <?= $products[7]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[7]["image"] ?>" alt="chicken-fajita" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[8]["image"] ?>" alt="fettuccine-alfredo" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[8]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[8]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#alfredoModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[8]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="alfredoModal" tabindex="-1" aria-labelledby="alfredoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="alfredoLabel">
                                        <?= $products[8]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[8]["image"] ?>" alt="fettuccine-alfredo" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[9]["image"] ?>" alt="slim-jim" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[9]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[9]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#slimJimModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[9]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="slimJimModal" tabindex="-1" aria-labelledby="slimJimLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="slimJimLabel">
                                        <?= $products[9]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[9]["image"] ?>" alt="slim-jim" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[10]["image"] ?>" alt="nacho-power-bowl" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[10]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[10]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#nachoPowerBowlModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[10]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="nachoPowerBowlModal" tabindex="-1" aria-labelledby="nachoPowerBowlLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="nachoPowerBowlLabel">
                                        <?= $products[10]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[10]["image"] ?>" alt="nacho-power-bowl" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $products[11]["image"] ?>" alt="santa-fé-power-bowl" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $products[11]["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $products[11]["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#santafepowerbowlModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted"><?= $products[11]["price"] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="santafepowerbowlModal" tabindex="-1" aria-labelledby="santafepowerbowlLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="santafepowerbowlLabel">
                                        <?= $products[11]["product_name"] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $products[11]["image"] ?>" alt="santa-fé-power-bowl" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Menu End -->
    <!-- Newsletter -->
    <div class="py-5 text-center container-fluid mb-0 mt-0 location">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <p class="lead text-muted"></p>
                <div class="form-floating d-flex flex-column flex-sm-row w-100 gap-5 justify-content-center">
                    <a id="contact">
                        <h2 class="fw-light">Signup for weekly specials and events</h2>
                    </a>
                    <button class="btn btn-primary" type="button" onclick="location.href='contact-us.html'">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End-->
    <!-- Footer -->
    <div class="container-fluid footer">
        <footer class="py-3 my-4 footer mb-0 mt-0">
            <ul class="nav justify-content-center pb-3 mb-3">
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted"><i class="bi bi-facebook lato-bold-blue-whale-26px"></i></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted"><i class="bi bi-twitter lato-bold-blue-whale-26px"></i></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted"><i class="bi bi-instagram lato-bold-blue-whale-26px"></i></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted"><i class="bi bi-linkedin lato-bold-blue-whale-26px"></i></a>
                </li>
            </ul>
            <p class="text-center mt-5 lato-bold-blue-whale-26px">
                McKinley Café Online
            </p>
            <p class="text-center text-muted">
                Copyright &copy; 2022 All rights reserved
            </p>
        </footer>
    </div>
    <!-- Footer End -->
</body>

</html>