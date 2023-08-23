<?php

        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $fname ='';
        $lname ='';
        $email ='';
        $addres ='';
        $phone ='';
        $pass ='';
        $erorr='';

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $fname =$_POST['Name'];
            $lname =$_POST['lname'];
            $email =$_POST['email'];
            $addres =$_POST['address'];
            $phone =$_POST['number'];
            $pass = $_POST['pass'];
            if(empty($fname) || empty($lname) || empty($email) || empty($pass)){
                $erorr='Please Complete the form';
            }else{
                $statement = $pdo->prepare("INSERT INTO users (user_Fname, user_Lname, user_email, address, phone, user_pass)
                            VALUES(:fname, :lname, :email, :address, :phone, :pass)");
                            $statement->bindValue(':fname',$fname);
                            $statement->bindValue(':lname',$lname);
                            $statement->bindValue(':email',$email);
                            $statement->bindValue(':address',$addres);
                            $statement->bindValue(':phone',$phone);
                            $statement->bindValue(':pass',$pass);
                            $statement->execute();
                            header('Location: ../../index.php');
            }
            

        }





    include_once("log.header.php")
?>
<body class="text-center">
          <div class="main">   
            <main class="form-signin">

                <form class="needs-validation form" method="post" enctype="multipart/form-data">

                    
                    <h1 class="h3 mb-3 fw-normal">Please log in</h1>
                    <div class="form-floating mrn">
                        <input type="text" name="Name" class="form-control" id="floatingInput" value="<?php echo $fname ?>"  placeholder="f" >
                        <label for="floatinInput">First Name</label>
                        
                    </div>
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $lname ?>"  placeholder="f" name="lname">
                        <label for="floatingInput">Last Name</label>
                    </div>

                    <div class="form-floating mrn">
                        <input type="email" class="form-control" id="floatingInput" value="<?php echo $email ?>"  placeholder="f" name="email">
                        <label for="floatingInput">Email address</label>
                    </div>
                
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $addres ?>" placeholder="f" name="address">
                        <label for="floatingInput">address</label>
                    </div>
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $phone ?>" placeholder="f" name="number">
                        <label for="floatingInput">phone number</label>
                    </div>
                    <div class="form-floating mrn">
                        <input type="password" class="form-control" id="floatingPassword" value="<?php echo $pass ?>"  placeholder="Password" name="pass">
                        <label for="floatingPassword">Password</label>
                    </div>
                
                    <button class="w-50 btn btn-lg btn-primary btn1" type="submit">Join</button>
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