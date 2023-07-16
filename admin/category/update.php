<?php
    session_start();

    if (isset($_SERVER['REQUEST_METHOD'])=="POST"){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }

    $data = ['name' => $name, 'description' => $description];

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
    $pdo = new PDO("mysql:host=$servername;dbname=testproject", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }

    $sql="UPDATE categores SET name=:name, description=:description WHERE id=$id"; //$id ইনপুট (edit.php) ফিল্ড থেকে যে আইডি আসছে, সেই আইডি ধরে ডাটা আপডেট হবে।
    $stmt=$pdo->prepare($sql);     
    $stmt->execute($data);

    $_SESSION['msg'] = "Data Updated Successfully";
    header('Location: ./list.php');
?>