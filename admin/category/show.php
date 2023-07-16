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
    
    $stmt = $pdo->query("SELECT * FROM categores where id=$id");
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
            <div class="ms-3">
                <h4>Category Details | <span><a style="text-decoration: none;" href="./list.php">List</a></span></h4>
            </div>
            <hr>
            <div class="row ms-2">
                <div class="row">
                    <div class="col-md-2">
                        <h4>Name : </h4>
                    </div>
                    <div class="col-md-10">
                        <span><p><?php echo @$category['name'];?></p></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h4>Description : </h4>
                    </div>
                    <div class="col-md-10">
                        <span><p><?php echo @$category['description'];?></p></span>
                    </div>
                </div>               
            </div>
        </div>
        <?php include_once('../inc/partials/footer.php');?>
</html>