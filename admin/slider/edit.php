
<?php
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
    $pdo = new PDO("mysql:host=$servername;dbname=testproject", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
        
    $stmt = $pdo->query("SELECT * FROM categores WHERE id = $id");
    $category = $stmt->fetch();
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
                <h4>Category Update | <span><a style="text-decoration: none;" href="./list.php">List</a></span></h4>
            </div>
            <hr>
            <form class="form-control" action="../../src/category/update.php" method="post">
                <input type="hidden" class="form-control" name="id" id="id" value="<?=$id;?>">
                <div class="mb-3 mx-3">
                  <label for="Name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="Name" value="<?=$category['name'];?>">
                </div>
                <div class="mb-3 mx-3">
                  <label for="Description" class="form-label">Description</label>
                  <input type="text" class="form-control" name="description" id="Description" value="<?=$category['description'];?>">
                </div>
                <div class="d-flex justify-content-end me-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <?php include_once('../inc/partials/footer.php');?>
</html>