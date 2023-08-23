<?php

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id= $_GET['id'];
    $pro = $pdo->prepare('SELECT * FROM products WHERE pro_id = :id');
    $pro->bindValue(':id',$id);
    $pro->execute();
    $statement = $pro->fetch(PDO::FETCH_ASSOC);


    $name =$statement['pro_name'];
    $brand =$statement['pro_brand'];
    $type = $statement['pro_type'];
    $des = $statement['pro_description'];
    $price = $statement['price'];
    $imagePhath = '';

   
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name =$_POST['name'];
        $brand =$_POST['brand'];
        $type = $_POST['type'];
        $des = $_POST['des'];
        $price =  $_POST['price'];
        if(empty($name) || empty($brand) || empty($type) || empty($price) ){
            $erorr='Please Complete the form';
        }else{

            $image = $_FILES['image'] ?? null;
            if($image && $image['tmp_name']){
                $imagePhath = '../web/images/pro/'.$image['name'];
                // echo '<pre>';
                // var_dump($imagePhath);
                // echo'</pre>';
               
                move_uploaded_file($image['tmp_name'] , $imagePhath);
            }



            $statement = $pdo->prepare("UPDATE products SET pro_name = :name , pro_brand=:brand , pro_image=:img , pro_type=:type , pro_description =:des , price=:price WHERE pro_id =:id");
            $statement->bindValue(':id',$id);
            $statement->bindValue(':name',$name);
            $statement->bindValue(':brand',$brand);
            $statement->bindValue(':img',$imagePhath);
            $statement->bindValue(':type',$type);
            $statement->bindValue(':des',$des);
            $statement->bindValue(':price',$price);
            $statement->execute();
            header('Location: adminP.php');}
        };



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../web/css/bootstrap.min.css">
    <link rel="stylesheet" href="../web/cssP/admin.css">
    <link rel="stylesheet" href="../log/log.css">
    <title>shose</title>
</head>

<body class="text-center">

          <div class="main">   
            <main class="form-signin">

                <form class="needs-validation form" method="post" enctype="multipart/form-data">

                    
                    <h1 class="h3 mb-3 fw-normal">Update Product</h1>
                    <div class="form-floating mrn">
                        <input type="text" name="name" class="form-control" id="floatingInput"  placeholder="f" value="<?php echo $name ?>" >
                        <label for="floatinInput">Product Name</label>
                        
                    </div>
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput"   placeholder="f" name="brand"  value="<?php echo $brand ?>" >
                        <label for="floatingInput">Brand</label>
                    </div>

                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput"   placeholder="f" name="type"  value="<?php echo $type ?>">
                        <label for="floatingInput">Type</label>
                    </div>
                 
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput"   placeholder="j" name="des" value="<?php echo $des ?>">
                        <label for="floatingInput">Description</label>
                    </div>
                    <div class="form-floating mrn">
                        <input type="number" class="form-control" id="floatingInput"   placeholder="i" name="price"  value="<?php echo $price ?>">
                        <label for="floatingInput">Price</label>
                    </div>
                    <div class="mb-2 ">
                        <label>Product Image</label> <br>
                        <input type="file" name="image"  value="<?php echo $img ?>" >
                    </div>
                
                    <button class="w-50 btn btn-lg btn-primary btn1" type="submit">Update</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>
            </form>
            <?php if(!empty($erorr)):?>
                <div class="alert alert-danger d-flex align-items-center" role="alert"><?php echo $erorr ?><div>
            <?php endif; ?>
            </main>
    </div>
   
        
    <script src="../web/js/bootstrap.bundle.min.js"></script>
</body>  


</html>