
<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
    $pdo = new PDO("mysql:host=$servername;dbname=testproject", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
    
    $stmt = $pdo->query("SELECT * FROM categores ORDER BY id DESC");
    $categores = $stmt->fetchAll();
?>

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
                <h4>Product Creat | <span><a style="text-decoration: none;" href="./list.php">List</a></span></h4>
            </div>
            <hr>
            <!-- ----------------form data sent ../../src/category/insert.php---------------- -->
            <form class="form-control" action="./insert.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3 mx-3">
                  <label for="Name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="Name" aria-describedby="name" value="">
                </div>
                <div class="form-group mb-3 mx-3">
                    <label for="category_id" class="form-label">Category_id</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option disabled value="0" selected>Category Select</option>
                        <?php
                        foreach ($categores as $category) {?>
                          <option value="<?=$category['id'];?>"><?=$category['name'];?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3 mx-3">
                  <label for="Description" class="form-label">Description</label>
                  <input type="text" name="description" class="form-control" id="Description" value="">
                </div>
                <div class="form-group mb-3 mx-3">
                  <label for="Price" class="form-label">Price</label>
                  <input type="number" name="price" class="form-control" id="Price" value="">
                </div>
                <div class="form-group mb-3 mx-3">
                  <label for="Image" class="form-label">Image</label>
                  <input type="file" name="image" class="form-control" id="Image" value="">
                </div>
                <div class="d-flex justify-content-end me-3">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <?php include_once('../inc/partials/footer.php');?>
</html>

