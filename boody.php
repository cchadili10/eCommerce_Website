<?php



    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    

    if(!empty($_GET['id']) ){
        $id = $_GET['id'];
    
        switch($id){
            case "Nike":
                $statement = $pdo->prepare("SELECT * FROM products WHERE pro_brand ='$id' ");
                $statement->execute();
                $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                break;
            case "Puma":
                $statement = $pdo->prepare("SELECT * FROM products WHERE pro_brand ='$id' ");
                $statement->execute();
                $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                break;
            case "Adidas":
                $statement = $pdo->prepare("SELECT * FROM products WHERE pro_brand ='$id' ");
                $statement->execute();
                $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                break;
            default:
                $statement = $pdo->prepare("SELECT * FROM products");
                $statement->execute();
                $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                break;
                
        }
   
}
   
    
    //  include('app/connection.php')
     include_once('app/header.php');

     





?>

    <section class="items" id="i_tems">
    <h1 class="h11"><?php  if(!empty($_GET['id']) ){
  echo $_GET['id']  ;}?></h1>
    <div class="box">
        <?php foreach($products as $p1): ?>
          
        <div class="item">
            <a class="linkItem" href="show_item.php?id=<?php echo $p1['pro_id'] ?>">
                <img class="imgitem" src="app/web/<?php echo $p1['pro_image'] ?>" >
                <h2 class="h2"><?php echo $p1['pro_name'] ?></h2>
                <h4  class="h2"><?php echo $p1['pro_type'] ?></h4>
                <a href="show_item.php" class="btn  btn-lg btn1" type="submit"><?php echo $p1['price'] ?> DH</a>
            </a>
        </div>
        <?php endforeach; ?>
    </div>