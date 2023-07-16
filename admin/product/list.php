<!-- --------------------session start----------------------- -->
<?php

    $webRoot = "http://localhost/";
    $webPath = $webRoot.'TestProject_procedural/public/assets/uploads/products/';

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
    
    // $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
    $stmt = $pdo->query("SELECT products.*, categores.name as category_id from products left join categores on products.category_id = categores.id");
    $products = $stmt->fetchAll();
?>

<!doctype html>
<html lang="en">
    <?php include_once('../inc/partials/head.php');?>
    <body id="body-pd">
        <?php include_once('../inc/partials/header.php');?>
        <aside>
            <div class="l-navbar" id="nav-bar">
            <?php include_once('../inc/partials/sidebar.php');?>
            </div>
        </aside>
        <main>
            <div class="height-100 bg-light">
                <div>
                    <h4>Product List :</h4>
                </div>
                <hr>
                <div>
                    <a class="btn btn-primary" href="../product/creat.php">Creat</a>
                </div>
                <br>
                <div>

                    <!-- ----------------------successful message------------------ -->
                    <?php                                   
                    if (isset($_SESSION['msg'])){ ?>          <!---যদি session এর ভীতরে msg থাকে, তাহলে ভীতরের ম্যাসেজটি প্রিন্ট করবে।--->
                    <div class="alert alert-success">
                        <strong><?php echo $_SESSION['msg']; ?></strong>      <!---update_store.php এর ম্যাসেজটি প্রিন্ট করবে।------------->
                        <a href="#" class="close d-flex justify-content-end" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    <?php unset($_SESSION['msg']); ?>       <!---redirect.php এর ম্যাসেজটি দেখানোর পর ডিলিট হয়ে যাবে---------------->
                    <?php } ?>
                    <?php                                           
                    if (isset($_SESSION['error'])){ ?>        <!---যদি session এর ভীতরে error পায়, তাহলে ভীতরের ম্যাসেজটি প্রিন্ট করবে।-->
                    <div class="alert alert-danger alert-dismissible">
                      <?php echo $_SESSION['error']; ?>       
                      <a href="#" class="close d-flex justify-content-end" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    <?php unset($_SESSION['error']); ?>       
                    <?php } ?>

                </div>          
                <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- ---------------------------Dynamic database table -------------------------------- -->
                        <?php
                        $i = 1;                                                
                        foreach ($products as $product){  ?>                 
                            <tr class="">
                                <td scope="row"><?= $i++ ?></td>                           
                                <td scope="row"><?= $product['name']; ?></td>              
                                <td scope="row"><?= $product['category_id']; ?></td>              
                                <td scope="row"><?= $product['description']; ?></td>      
                                <td scope="row"><?= $product['price']; ?></td>
                                <td scope="row"><img src="<?= $webPath.$product['image'];?>" alt="Image" height="120px" width="160px"></td>
                                <td scope="row" class="d-flex">
                                    <a class="btn btn-info me-1" href="show.php?id=<?=$product['id'];?>">Show</a>     
                                    <a class="btn btn-warning me-1" href="edit.php?id=<?=$product['id'];?>">Edit</a>
                                    <form action="../../src/category/delete.php" method ="post">                 
                                        <input type="hidden" name="id" value="<?=$category['id'];?>">
                                        <button type="submit" name="submit" class="btn btn-danger" onclick="confirm ('Are You Sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }  ?>
                    <!-- ---------------------------Dynamic database table end------------------------------ -->
                    </tbody>
                </table>
            </div>
        </main>
    </body>
    <!-- <?php include_once('../inc/partials/footer.php');?> -->
</html>