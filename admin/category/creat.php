
<!doctype html>
<html lang="en">
    <?php include_once('../inc/partials/head.php');?>
    <body id="body-pd">
        <?php include_once('../inc/partials/header.php');?>
        <div class="l-navbar" id="nav-bar">
        <?php include_once('../inc/partials/sidebar.php');?>
        </div>
    </body>
        <div class="height-100 bg-light">
            <div>
                <h4>Category Creat | <span><a style="text-decoration: none;" href="./list.php">List</a></span></h4>
            </div>
            <hr>
            <!-- ----------------form data sent ./insert.php---------------- -->
            <form class="form-control" action="./insert.php" method="POST">
                <div class="mb-3 mx-3">
                  <label for="Name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="Name" aria-describedby="name" value="">
                </div>
                <div class="mb-3 mx-3">
                  <label for="Description" class="form-label">Description</label>
                  <input type="text" name="description" class="form-control" id="Description" value="">
                </div>
                <div class="d-flex justify-content-end me-3">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <?php include_once('../inc/partials/footer.php');?>
</html>