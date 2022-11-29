<?php include('partials/navbar.php') ?>
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
                <?php foreach ($products as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img class="bd-placeholder-img card-img-top" height="100" src="product_images/<?= $row["image"] ?>" alt="Chicken-Sandwich" />

                            <div class="card-body">
                                <h4 class="text-center"><?= $row["product_name"] ?></h4>
                                <p class="card-text">
                                    <?= $row["description"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#<?= strval($row['product_id']) ?>">
                                            View
                                        </button> -->
                                        <button type="button" class="add btn btn-sm btn-outline-secondary" value="<?= $row['product_id'] ?>">
                                            Add
                                        </button>
                                    </div>
                                    <small class="text-muted">$ <?= number_format((float)$row["price"], 2, '.', '') ?></small>
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
<script>
    $("#menu_page").removeClass("text-muted");
    $("#menu_page").addClass("active fw-bold");
</script>
<!-- Newsletter End-->
<?php include('partials/menu_footer.php') ?>