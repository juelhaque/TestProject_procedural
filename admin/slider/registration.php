<!doctype html>
<html lang="en">
<?php include_once('../inc/partials/head.php'); ?>

<body id="body-pd">
    <?php include_once('../inc/partials/header.php'); ?>
    <div class="l-navbar" id="nav-bar">
        <?php include_once('../inc/partials/sidebar.php'); ?>
    </div>
</body>
<div class="height-100 bg-light mt-15">
<section class="vh-100"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body py-3 px-5">
              <h3 class="text-uppercase text-center mb-2">Create an account</h3>

              <form>

                <div class="form-outline mb-2">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-3">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-3">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-3">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                <div class="form-check d-flex justify-content-center mb-3">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <a href="./login.php"><button type="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button></a>
                </div>

                <p class="text-center text-muted mt-3 mb-0">Have already an account? <a href="./login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<?php include_once('../inc/partials/footer.php'); ?>

</html>