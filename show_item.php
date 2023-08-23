<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $prd = $_GET['id'];


    $statement = $pdo->prepare('SELECT * FROM products WHERE pro_id =:id ');
    $statement->bindValue(':id', $prd);
    $statement->execute();
    $products = $statement->fetch(PDO::FETCH_ASSOC);
    $name =$products['pro_name'];
    $price =$products['price'];
    include_once("app/header1.php");
    $nbe = '';
    $size = '';
    $msj = '';
    if(!empty($_SESSION['user__id'])){
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $nbe = $_POST['nbrorder'];
            $size =  $_POST['size'];
            if(!empty($nbe) || !empty($size)){
                // $_SESSION['nbro'] = $nbe;
                // $_SESSION['size'] = $size;
                // $_SESSION['prd__id'] = $prd;

                $orders = $pdo->prepare("INSERT INTO orders (order_size, quantity, order_date, user_id, pro_id)
                            VALUES(:size, :quantity, :date, :user_id, :pro_id)");
                $orders->bindValue(':size',$size);
                $orders->bindValue(':quantity',$nbe);
                $orders->bindValue(':date',date('y-m-d H:i:S'));
                $orders->bindValue(':user_id',$_SESSION["user__id"]);
                $orders->bindValue(':pro_id',$prd);
                $orders->execute();

                header('Location: order.php');
                
            }
        
        }
    }else{$msj = "Please Log in to Order Shoes";}
?>
    
<section class="itm">
    <div class="all"></div>
    <div class="box1">
        <img class="boximg" src="app\web\<?php echo $products['pro_image']; ?>" alt="" srcset="">
    </div>
    <div class="box2">
        <div class="boox1">
            <h1><?php echo $name; ?></h1>
            <h2><?php echo $price; ?> DH</h2>
           
        </div>
         <form action="" method="post">
        <div class="boox2">
            <h1>Size</h1>
            <select name="size"  class="form-select" aria-label="Default select example">
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
            </select>
        </div>
        
       
        <div class="boox3 d-flex">
            <input name="nbrorder"  class="form-control w-25 ordd" type="number" value="1" min="1" max="10">
            <button name="sub" type="submit" class="btn btn-success btn-lg w-100">Order New</button>
        
        </div>
    </form>
    </div>
    </div>
</section>
<?php if(!empty($msj)):?>
        <div class="alert alert-danger cdd w-100 d-flex justify-content-center " role="alert"><?php echo $msj ?></div> <?php endif; ?>





<script src="app/web/javascript/index.js"></script>
<script src="app/web/javascript/jquery-3.6.0.min.js"></script>
<script src="app/web/js/bootstrap.bundle.min.js"></script>


</body>