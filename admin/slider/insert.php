<!-- -----------------------------sesson start---------------------------- -->
<?php

    $docRoot = $_SERVER['DOCUMENT_ROOT'];
    $updoadImg = $docRoot.'/TestProject_procedural/public/assets/uploads/sliders/';

    session_start();
    
    // ------------------------------form data collect----------------------------
    if (isset($_SERVER['REQUEST_METHOD'])=="POST"){

        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $imgFullName = $_FILES['sliderImg']['name'];
        $fullPath = $_FILES['sliderImg']['full_path'];
        $tmpName = $_FILES['sliderImg']['tmp_name'];

        $target = $updoadImg;
        move_uploaded_file($tmpName, $target.$imgFullName);
    }

    $data = [
        'title' => $title, 
        'description' => $description,
        'image' => $imgFullName
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
    $sql = "INSERT INTO sliders (title, description, image) VALUES (:title, :description, :image)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);

    // -----------------------------Redirect apply-------------------------------
    $_SESSION['msg'] = "Data Submitted Successfully";
    header('Location: ../../admin/product/list.php');
?>