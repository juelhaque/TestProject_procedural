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
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-5 col-xl-4">
                    <form class="align-item-center">
                        <br>
                        <div class="d-flex flex-row mb-2 align-items-center justify-content-center">
                            <p class="lead fw-normal mb-0 me-3" style="color: blue;">Sign in with Email</p>
                        </div>
                        
                        <!-- Email input -->
                        <div class="form-outline mb-0">
                            <input type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example3"></label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-0">
                            <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                            <label class="form-label" for="form3Example4"></label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body" style="text-decoration: none;">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-1 pt-2">
                            <button type="button" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="./registration.php" class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once('../inc/partials/footer.php'); ?>

</html>