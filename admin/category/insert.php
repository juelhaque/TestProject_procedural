<!-- -----------------------------sesson start---------------------------- -->
<?php

    session_start();
    
    // ------------------------------form data collect----------------------------
    if (isset($_SERVER['REQUEST_METHOD'])=="POST"){

        $name = $_POST['name'];
        $description = $_POST['description'];
        
    }

    $data = [
        'name' => $name, 
        'description' => $description
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
    $sql = "INSERT INTO categores (name, description) VALUES (:name, :description)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);

    // -----------------------------Redirect apply-------------------------------
    $_SESSION['msg'] = "Data Submitted Successfully";
    header('Location: ./list.php');
?>