<!-- -----------------------------sesson start---------------------------- -->
<?php

    $docRoot = $_SERVER['DOCUMENT_ROOT'];
    $updoadImg = $docRoot.'/TestProject_procedural/public/assets/uploads/products/';

    session_start();
    
    // ------------------------------form data collect----------------------------
    if (isset($_SERVER['REQUEST_METHOD'])=="POST"){

        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        
        $imgFullName = $_FILES['image']['name'];
        $fullPath = $_FILES['image']['full_path'];
        $tmpName = $_FILES['image']['tmp_name'];

        $target = $updoadImg;
        move_uploaded_file($tmpName, $target.$imgFullName);
    }

    $data = [
        'name' => $name, 
        'category_id' => $category_id, 
        'description' => $description,
        'price' => $price,
        'image' => $imgFullName,
    ];

    // -----------------------------database connection-----------------------------
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
    $pdo = new PDO("mysql:host=$servername;dbname=testproject", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }

    // ------------------------------database query apply--------------------------
    $sql = "INSERT INTO products (name, category_id, description, price, image) 
    VALUES (:name, :category_id, :description, :price, :image)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);

    // -----------------------------Redirect apply-------------------------------
    $_SESSION['msg'] = "Data Submitted Successfully";
    header('Location: ./list.php');
?>