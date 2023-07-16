<?php
    session_start();
    if (isset($_POST['submit']))
    {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
        $pdo = new PDO("mysql:host=$servername;dbname=testproject", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
        
        $sql = "DELETE FROM categores WHERE id=$id";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();    

        $_SESSION['error'] = "Data Deleted Successfully";
        header('Location: ./list.php');
    }
?>