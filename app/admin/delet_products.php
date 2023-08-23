<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id= $_GET['id'];
    $pro = $pdo->prepare('DELETE  FROM products WHERE pro_id = :id');
    $pro->bindValue(':id',$id);
    $pro->execute();
    header("Location: adminP.php")


?>