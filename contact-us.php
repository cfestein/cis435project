<?php include('partials/navbar_contact.php') ?>

<body class="size">
    <div class="container mt-5">
        <div class="row mb-2 justify-content-center">
            <div class="col-md-10 b">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 card">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-2 lato-bold-blue-whale-27px">
                            Suggestions Welcome!
                        </h3>
                        <div class="mb-1 text-muted">
                            <i class="bi bi-geo-alt me-2"></i>
                            4901 Evergreen, Dearborn, MI 48128
                        </div>
                        <div class="mb-1 text-muted">
                            <i class="bi bi-telephone me-2 mb-5"></i>(313) 583-6330
                        </div>

                        <form class="form-signin w-100 m-auto" method="POST" action="form-submit.php">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="fname" placeholder="name" name="fname" />
                                <label class="text-muted" for="fname">Name</label>
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" />
                                <label class="text-muted" for="email">Email address</label>
                            </div>
                            <!-- </form>
              <form class="form-signin w-100 m-auto"> -->
                            <!-- <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingSubject"
                    placeholder="subject"
                  />
                  <label class="text-muted" for="floatingSubject"
                    >Subject</label
                  >
                </div>
                <div class="form-floating">
                  <textarea
                    style="
                      height: 145px;
                      border-top-left-radius: 0;
                      border-top-right-radius: 0;
                    "
                    class="form-control"
                    type="message"
                    id="floatingMessage"
                    cols="30"
                    rows="5"
                    placeholder="Enter your message here"
                  ></textarea>
                  <label class="text-muted" for="floatingMessage"
                    >Your Message</label
                  >
                </div> -->
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                    <div class="col-md-6 d-none d-lg-block">
                        <img class="" src="images/other/map.png" alt="" height="500" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#contact_page").removeClass("text-muted");
        $("#contact_page").addClass("active fw-bold");
    </script>
</body>

<?php include('partials/footer.php') ?>