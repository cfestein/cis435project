<?php
session_start();
if (isset($_POST['time']) && isset($_POST['total'])) {
    $time = $_POST['time'];
    $total = $_POST['total'];
}
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
                var btnClass = $(this).attr('id');
                //if button is checkout
                var email_temp = $('input[name="email"]').val();
                var total_temp = $('input[name="total"]').val();
                var order_time_temp = $('input[name="time"]').val();
                var name_temp = $('input[name="name"]').val();
                if (btnClass == "order") {
                    if ($('input[name="name"]').val() == "") {
                        alert('please enter a name');
                    } else if ($('input[name="email"]').val() == "") {
                        alert('please enter an email');
                    } else if (!email_temp.includes("@")) {
                        alert('please enter a valid email');
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "cart.php",
                            data: {
                                total: total_temp,
                                order_time: order_time_temp,
                                name: name_temp,
                                email: email_temp
                            },
                            success: function(result) {
                                alert('order placed');
                            },
                            error: function(result) {
                                alert('error');
                            }

                        })
                    }
                }
                $(document).ajaxStop(function() {
                    window.location = "http://mckinleycafeonline.fall2022web.tech/menu.php";
                });
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
                        <a href="index.php" class="nav-link px-2 text-muted">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 fw-bold active">Menu</a>
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
    <main>
        <div class="container mt-5">
            <div class="row mb-2 justify-content-center">
                <div class="col-md-10">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 card">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="mb-1 text-muted mt-5">
                                <i class="bi bi-geo-alt me-2"></i>
                                4901 Evergreen, Dearborn, MI 48128
                            </div>
                            <div class="mb-1 text-muted">
                                <i class="bi bi-telephone me-2 mb-5"></i>(313) 583-6330
                            </div>
                            <form id="form" method="POST" class="form-signin w-100 m-auto mt-5 justify-content-center">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" placeholder="enter name">
                                    <label class="text-muted" for="name">Name</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" placeholder="enter email">
                                    <label class="text-muted" for="email">Enter email</label>
                                </div>
                                <input type="hidden" name="total" value="<?= $_POST['total'] ?>">
                                <input type="hidden" name="time" value="<?= $_POST['time'] ?>">
                            </form>
                            <div class="justify-content-center">
                                <button class="btn btn-lg btn-primary mt-5 w-100" id=order>
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <div class="container-fluid footer">
    </div>
    <!-- Footer End -->
</body>

</html>