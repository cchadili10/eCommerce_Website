<?php
   
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $name='';
    $brand='';
    $type='';
    $des='';
    $price='';
    $imagePhath='';

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name=$_POST['name'];
        $brand=$_POST['brand'];
        $type=$_POST['type'];
        $des=$_POST['des'];
        $price=$_POST['price'];
        if(empty($name)||empty($brand)||empty($type)||empty($price)){
            $erorr='complet the form';
        }else{
            $image = $_FILES['image'] ?? null;
            if($image && $image['tmp_name']){
                
                $imagePhath = '../web/images/pro/'.$image['name'];
               
                move_uploaded_file($image['tmp_name'] , $imagePhath);
            }
            $statement = $pdo->prepare("INSERT INTO products (pro_name, pro_brand, pro_image, pro_type, pro_description, size_id, price)
                            VALUES(:name,:brand, :image, :type,:des,:size,:price)");
            $statement->bindValue(':name',$name);
            $statement->bindValue(':brand',$brand);
            $statement->bindValue(':image',$imagePhath);
            $statement->bindValue(':type',$type);
            $statement->bindValue(':des',$des);
            $statement->bindValue(':size',1);
            $statement->bindValue(':price',$price);
            $statement->execute();
            header("Location: adminP.php");
        }

    }


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

                    
                    <h1 class="h3 mb-3 fw-normal">Add Product</h1>
                    <div class="form-floating mrn">
                        <input type="text" name="name" class="form-control" id="floatingInput"  placeholder="f" >
                        <label for="floatinInput">Product Name</label>
                        
                    </div>
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput"   placeholder="f" name="brand">
                        <label for="floatingInput">Brand</label>
                    </div>

                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput"   placeholder="f" name="type" >
                        <label for="floatingInput">Type</label>
                    </div>
                 
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput"   placeholder="j" name="des">
                        <label for="floatingInput">Description</label>
                    </div>
                    <div class="form-floating mrn">
                        <input type="number" class="form-control" id="floatingInput"   placeholder="i" name="price">
                        <label for="floatingInput">Price</label>
                    </div>
                    <div class="mb-2 ">
                        <label>Product Image</label> <br>
                        <input type="file" name="image" >
                    </div>
                
                    <button class="w-50 btn btn-lg btn-primary btn1" type="submit">Add</button>
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