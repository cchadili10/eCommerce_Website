<?php 
    session_start();
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->prepare('DELETE FROM orders WHERE user_id = :id');
    $statement->bindValue(':id',$_SESSION['user__id']);
    $statement->execute();
    $dellac = $pdo->prepare('DELETE FROM users WHERE user_id = :id');
    $dellac->bindValue(':id',$_SESSION['user__id']);
    $dellac->execute();
    session_unset();
    header('Location: ../../index.php')
?>