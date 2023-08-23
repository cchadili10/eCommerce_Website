<?php 
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->prepare('DELETE FROM orders WHERE order_id = :id');
    $statement->bindValue(':id', $_GET['id']);
    $statement->execute();
    header('Location: ../../order.php')
?>