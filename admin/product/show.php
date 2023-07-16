<?php

    $webRoot = "http://localhost/";
    $webPath = $webRoot.'TestProject_procedural/public/assets/uploads/products/';

    $id = $_GET['id'];

    // print_r($id);
    // die();

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
    $pdo = new PDO("mysql:host=$servername;dbname=testproject", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
    
    // $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
    $stmt = $pdo->query("SELECT * FROM products where id=$id");
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
            <div class="ms-3">
                <h4>Product Details | <span><a style="text-decoration: none;" href="./list.php">List</a></span></h4>
            </div>
            <hr>
            <div class="row ms-2">
                <div class="row">
                    <div class="col-md-2">
                        <h4>Name : </h4>
                    </div>
                    <div class="col-md-10">
                        <span><p><?php echo @$product['name'];?></p></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h4>Description : </h4>
                    </div>
                    <div class="col-md-10">
                        <span><p><?php echo @$product['description'];?></p></span>
                    </div>
                </div>               
                <div class="row">
                    <div class="col-md-2">
                        <h4>Price : </h4>
                    </div>
                    <div class="col-md-10">
                        <span><p><?php echo @$product['price'];?></p></span>
                    </div>
                </div>               
                <div class="row">
                    <div class="col-md-2">
                        <h4>Image : </h4>
                    </div>
                    <div class="col-md-10">
                        <span><p><img src="<?= $webPath.$product['image'];?>" alt="Image" height="120px" width="160px"></p></span>
                    </div>
                </div>               
            </div>
        </div>
        <?php include_once('../inc/partials/footer.php');?>
</html>