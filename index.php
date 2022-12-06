<?php include('partials/navbar.php') ?>
<main>
    <!-- Jumbotron -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 bground-img" src="images/background/fresh_ingredients.jpg" alt="First slide" />
                <div class="carousel-caption d-none d-md-block">
                    <div class="row py-lg-5">
                        <div class="col-lg-12 col-md-8 mx-auto">
                            <h1 class="fw-light lato-light-blue-whale-63px">
                                McKinley Café is the heart of culinary service on main
                                campus.
                            </h1>
                            <p class="lead col-lg-6 mx-auto text-dark">
                                Picasso Deli, the Grille (serving breakfast, lunch and
                                dinner), the Expo (daily full-meal specials), piping hot
                                pizza, famous Mac & cheese, delicious soups, salad bar, grab
                                & go items, assorted beverages, and Starbucks.
                            </p>
                            <p>
                                <a href="menu.php" class="btn btn-lg btn-primary my-2">Start Order</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron End -->
    <!-- This Weeks Specials -->
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="pricing-header p-3 pb-md-4 mx-auto mb-5 text-center">
                <h1 class="display-4 fw-light">This Weeks Specials</h1>
                <img class="fs-5 text-muted" src="images/other/yellow_line.png" alt="line" />
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($specials as $special) { ?>
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="product_images/<?= $special["image"] ?>" alt="Apple-Turnover" />

                            <div class="card-body d-flex flex-column">
                                <h4 class="text-center"><?= $special["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $special["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary mt-auto" data-bs-toggle="modal" data-bs-target="#<?= (string)$special['product_id'] ?>">
                                            View
                                        </button> -->
                                        <!--<button type="button" class="btn btn-sm btn-outline-secondary mt-auto">
                                            Add
                                        </button>-->
                                    </div>
                                    <small class="text-muted">$ <?= number_format((float)$special["price"], 2, '.', '') ?></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <!-- <div class="modal fade" id="<?= (string)$special['product_id'] ?>" tabindex="-1" aria-labelledby="falafelLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="falafelLabel">Falafel</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img class="rounded mx-auto d-block" style="width: 90%" src="images/menu/falafel.jpg" alt="falafel" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- Modal End -->
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- This Weeks Specials End -->
    <!-- Reccomendation -->
    <div id="carouselslide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 bground-img" src="images/background/healthy.jpg" alt="First slide" />
                <div class="carousel-caption d-none d-md-block">
                    <div class="row py-lg-5">
                        <div class="col-lg-12 col-md-8 mx-auto">
                            <h1 class="fw-light lato-light-blue-whale-63px">
                                Ask Around
                            </h1>
                            <p class="lead col-lg-6 mx-auto text-dark">
                                McKinley Café Online allows me to get a quick, healthy,
                                affordable meal without the wait. It's Great! I can order
                                while class is on break, and my order is ready when I get
                                there!
                            </p>
                            <br />
                            <p class="lead col-lg-6 mx-auto text-dark">
                                - Chris class of '22
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reccomendation End -->
    <!-- Fan Favorites -->
    <section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="pricing-header p-3 pb-md-4 mx-auto mb-5 text-center">
                    <h1 class="display-4 fw-light">Fan Favorites</h1>
                    <img class="fs-5 text-muted" src="images/other/yellow_line.png" alt="line" />
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($favorites as $favorite) { ?>
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <img class="bd-placeholder-img card-img-top" height="100" src="product_images/<?= $favorite["image"] ?>" alt="Chicken-Sandwich" />

                                <div class="card-body">
                                    <h4 class="text-center"><?= $favorite["product_name"] ?></h4>
                                    <p class="card-text">
                                        <?= $favorite["description"] ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#<?= strval($favorite['product_id']) ?>">
                                                View
                                            </button> -->
                                            <!--<button type="button" class="add btn btn-sm btn-outline-secondary" value="<?= $favorite['product_id'] ?>">
                                                Add
                                            </button>-->
                                        </div>
                                        <small class="text-muted">$ <?= number_format((float)$favorite["price"], 2, '.', '') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <!-- <div class="modal fade" id="<?= strval($row['product_id']) ?>" tabindex="-1" aria-labelledby="chicken_sandwichLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="chicken_sandwichLabel">
                                            <?= $row["product_name"] ?>
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="rounded mx-auto d-block" style="width: 90%" src="product_images/<?= $row["image"] ?>" alt="Chicken-Sandwich" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- Modal End -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Fanfavorites -->
    <!-- Meal Cards -->
    <!--<div id="carouselexample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 bground-img" src="images/background/employee.jpg" alt="First slide" />
                <div class="carousel-caption d-none d-md-block">
                    <div class="row py-lg-5">
                        <div class="col-lg-12 col-md-8 mx-auto">
                            <h1 class="fw-light lato-light-blue-whale-63px">
                                Meal Cards Accepted
                            </h1>
                            <p class="lead col-lg-6 mx-auto text-dark">
                                You may purchase a Meal Card on the App or at McKinley Café
                                to use at all retail food locations on campus. Funds may be
                                added to the App remotely at your convienence.
                            </p>
                            <p>
                                <a href="#" class="btn btn-lg btn-primary my-2">Purchase Card</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Meal Cards End-->
</main>
<!-- Newsletter -->
<!--<div class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <a id="contact">
                <h1 class="fw-light">Newsletter</h1>
            </a>

            <p class="lead text-muted">Signup for weekly specials and events</p>
            <div class="form-floating d-flex flex-column flex-sm-row w-100 gap-2">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" />
                <label for="floatingInput">Email address</label>
                <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
        </div>
    </div>
</div>-->
<!-- Newsletter End-->
<!-- Location/Hours -->
<div class="container-fluid location">
    <div id="hours" class="row row-cols-1 row-cols-sm-2 row-cols-md-4 py-5 my-5 mb-0 mt-0 justify-content-center">
        <div class="col mb-3">
            <h5 class="d-flex justify-content-center lato-light-white-35px">
                McKinley Café
            </h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <h6 class="d-flex justify-content-center lato-light-white-18px">
                        Come see us in the University Center
                    </h6>
                </li>
                <li class="nav-item mb-2">
                    <h6 class="d-flex justify-content-center lato-light-white-18px">
                        4901 Greenfield Road
                    </h6>
                </li>
                <li class="nav-item mb-2">
                    <h6 class="d-flex justify-content-center lato-light-white-18px">
                        Dearborn, MI 48128
                    </h6>
                </li>
            </ul>
        </div>
        <div class="col mb-3">
            <h5 class="d-flex justify-content-center lato-light-white-26px">
                Hours
            </h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <h6 class="d-flex justify-content-center lato-light-white-18px">
                        Monday - Thursday: 8:00 AM - 7:00 PM
                    </h6>
                </li>
                <li class="nav-item mb-2">
                    <h6 class="d-flex justify-content-center lato-light-white-18px">
                        Friday: 8:00 AM - 2:00 PM
                    </h6>
                </li>
                <li class="nav-item mb-2">
                    <h6 class="d-flex justify-content-center lato-light-white-18px">
                        Saturday and Sunday: CLOSED
                    </h6>
                </li>
            </ul>
        </div>

        <div class="col mb-2">
            <img class="bd-placeholder-img card-img-top" style="width: 100%" src="images/other/map.png" alt="campus-map" />
        </div>
    </div>
</div>
<script>
    $("#home_page").removeClass("text-muted");
    $("#home_page").addClass("active fw-bold");
</script>
<!-- Location/Hours End -->
<?php include('partials/footer.php') ?>