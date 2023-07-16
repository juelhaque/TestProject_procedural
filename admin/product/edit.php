
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
        
    // $stmt = $pdo->query("SELECT * FROM products WHERE id = $id");
    $stmt = $pdo->query("SELECT products.*, categores.name as category_id from products left join categores on products.category_id = categores.id");
    $product = $stmt->fetch();
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
                <h4>Product Update | <span><a style="text-decoration: none;" href="./list.php">List</a></span></h4>
            </div>
            <hr>
            <form class="form-control" action="./update.php" method="post">
                <input type="hidden" class="form-control" name="id" id="id" value="<?=$id;?>">
                <div class="mb-3 mx-3">
                  <label for="Name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="Name" value="<?=$product['name'];?>">
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
                <div class="mb-3 mx-3">
                  <label for="Description" class="form-label">Description</label>
                  <input type="text" class="form-control" name="description" id="Description" value="<?=$product['description'];?>">
                </div>
                <div class="mb-3 mx-3">
                  <label for="Price" class="form-label">Price</label>
                  <input type="number" class="form-control" name="price" id="Price" value="<?=$product['price'];?>">
                </div>
                <div class="d-flex justify-content-end me-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <?php include_once('../inc/partials/footer.php');?>
</html>