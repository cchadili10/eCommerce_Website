<?php 
    session_start();
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dellac = $pdo->prepare('SELECT * FROM users WHERE user_id = :id');
    $dellac->bindValue(':id',$_SESSION['user__id']);
    $dellac->execute();
    $statement = $dellac->fetch(PDO::FETCH_ASSOC);
    $id = $_SESSION['user__id'];

    include_once('../log/log.header.php');




    if($_SERVER['REQUEST_METHOD']==='POST'){
        $fname =$_POST['Name'];
        $lname =$_POST['lname'];
        $addres =$_POST['address'];
        $phone =$_POST['phone'];
        $pass = $_POST['pass'];
        if(empty($fname) || empty($lname) || empty($pass)){
            $erorr='Please Complete the form';
        }else{
            $statement = $pdo->prepare("UPDATE users SET user_Fname=:fname, user_Lname=:lname,address=:address, phone=:phone, user_pass=:pass WHERE user_id =:id");
            $statement->bindValue(':id',$_SESSION['user__id']);
            $statement->bindValue(':fname',$fname);
            $statement->bindValue(':lname',$lname);
            $statement->bindValue(':address',$addres);
            $statement->bindValue(':phone',$phone);
            $statement->bindValue(':pass',$pass);
            $_SESSION['c_name'] = $fname;
            $statement->execute();
            header('Location: ../../index.php');}
        };



    // header('Location: ../../index.php')
?>

<body class="text-center">
          <div class="main">   
            <main class="form-signin">

                <form class="needs-validation form" method="post" enctype="multipart/form-data">

                    
                    <h1 class="h3 mb-3 fw-normal">UPDATE ACCOUNT</h1>
                    <div class="form-floating mrn">
                        <input type="text" name="Name" class="form-control" id="floatingInput" value="<?php echo $statement['user_Fname'] ?>"   placeholder="f" >
                        <label for="floatinInput"> First Name</label>
                        
                    </div>
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput"  value="<?php echo $statement['user_Lname'] ?>"  placeholder="f" name="lname">
                        <label for="floatingInput">Last Name</label>
                    </div>

                    <div class="form-floating mrn">
                        <input type="email" class="form-control" id="floatingInput" value="<?php echo $statement['user_email'] ?>"  placeholder="Disabled input"  name="email" disabled>
                        <label for="floatingInput">Email address</label>
                    </div>
                
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $statement['address'] ?>" placeholder="f" name="address">
                        <label for="floatingInput">address</label>
                    </div>
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $statement['phone'] ?>" placeholder="f" name="phone">
                        <label for="floatingInput">phone number</label>
                    </div>
                    <div class="form-floating mrn">
                        <input type="password" class="form-control" id="floatingPassword" value="<?php echo $statement['user_pass'] ?>" placeholder="Password" name="pass">
                        <label for="floatingPassword">Password</label>
                    </div>
                
                    <button class="w-50 btn btn-lg btn-primary btn1" type="submit">UPDATE</button>
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