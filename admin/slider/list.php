<!-- --------------------session start----------------------- -->
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
        <aside>
            <div class="l-navbar" id="nav-bar">
            <?php include_once('../inc/partials/sidebar.php');?>
            </div>
        </aside>
        <main>
            <div class="height-100 bg-light">
                <div>
                    <h4>Slider List :</h4>
                </div>
                <hr>
                <div>
                    <a class="btn btn-primary" href="../slider/creat.php">Creat</a>
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
                    <div class="alert alert-success alert-dismissible">
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
                        <th scope="col">Description</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- ---------------------------Dynamic database table -------------------------------- -->
                        <?php
                        $i = 1;                                                
                        foreach ($categores as $category){  ?>                 <!--যতগুলি ডাটা ইনসার্ট করা আছে লুপ ততবার ঘুরবে। category এর পরিবর্তে যে কোনো ওয়ার্ড লেখা যাবে, $categories এর ডাটা গুলো $category তে অ্যারে হিসাবে স্টোর হবে।------->
                            <tr class="">
                                <td scope="row"><?= $i++ ?></td>                            <!---সিরিয়াল নাম্বার ডাটাবেস থেকে না নিয়ে এখানে বানাবো, কেননা কোনো ডাটা ডিলিট করলে id ও ডিলিট হয়ে যায়।---->
                                <td scope="row"><?= $category['name']; ?></td>              <!--- (<?='';?>) এটি শর্টকাট echo---->
                                <td scope="row"><?= $category['description']; ?></td>       <!--এখানে name, description, created_at, updated_at হল ডাটাবেস এর কলাম এর নাম-->
                                <td scope="row"><?= $category['created_at']; ?></td>
                                <td scope="row"><?= $category['updated_at']; ?></td>
                                <td scope="row" class="d-flex">
                                    <a href="show.php?id=<?=$category['id'];?>">Show</a>|     <!-- ?id= আইডি প্যারাম বলা হয়, প্রত্তেকটি ইনসার্টেড ডাটার আইডি সেই ডাটার জন্য ক্যাস করবে, এখন যদি show button এ মাউস রাখি তাহলে ঐলাইনের ডাটার আইডি দেখাবে, এই স্পেসিফিক আইডি ধরে showInsertedData.php পেজ এ স্পেসিফিক ডাটা দেখাবো, show button এ ক্লিক করলে দেখতে পাবো সার্স বার দিয়ে ডাটা পাস হচ্ছে -->
                                    <a href="edit.php?id=<?=$category['id'];?>">Edit</a>|
                                    <form action="../../src/category/delete.php" method ="post">                 <!--এখান থেকে ইনপুট ডাটার আইডি delete.php পেজ এ পাঠাবো। আমরা যদি GET দিয়ে ডাটা এখান থেকে delete.php পেজ এ ডাটা পাঠাইতাম, তাহলে url এ ইনসার্টেড ডাটার আইডি পরিবর্তন করে ইন্টার করলে ডাটাটি ডিলিট হয়ে যাইতো, তাই form দিয়ে ডাটা পাঠানো হয়েছে। -------------------->
                                        <input type="hidden" name="id" value="<?=$category['id'];?>">
                                        <button type="submit" name="submit" class="btn-primary" onclick="confirm ('Are You Sure?')">Delete</button>
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