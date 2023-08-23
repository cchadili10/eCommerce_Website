<?php
        session_start();

        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //admin
        $statement = $pdo->prepare('SELECT * FROM admins');
        $statement->execute();
        $admin = $statement->fetchAll(PDO::FETCH_ASSOC);

        //client
        $client = $pdo->prepare('SELECT * FROM users');
        $client->execute();
        $cust = $client->fetchAll(PDO::FETCH_ASSOC);


        $error = [];
        $email = "";
        // var_dump($admin);
        // echo $admin["admin_email"];

        // if(empty($email)){
        //     $error[] = 'please enter email';
        // }
        // if(empty($pwd)){
        //     $error[] = 'please enter password';
        // }
        
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $email = $_POST["email"];
            $pwd = $_POST["pass"];

            foreach($admin as $ad){
                $admin_email =  $ad['admin_email'];
                $admin_pass =  $ad['admin_pass'];
               
                echo "jjj9i";
                if($email== $admin_email && $pwd == $admin_pass){
                    $_SESSION['email'] = $email;
                    $_SESSION['admin_id'] = $ad['admin_id'];
                    header('Location: ../admin/adminP.php');
                }
            }
            foreach($cust as $c1){
                $c_email =  $c1['user_email'];
                $c_pass =  $c1['user_pass'];
                
                if($email== $c_email && $pwd == $c_pass){
                    $_SESSION['c_email'] = $email;
                    $_SESSION['c_name'] = $c1['user_Fname'];
                    $_SESSION['user__id'] = $c1['user_id'];
                    header('Location: ../../index.php');
                }
            }
        }

    include_once("log.header.php")

?>
      <body class="text-center">
            <?php if (!empty($error)): ?>

            <div class="alert alert-danger" role="alert">
                <?php foreach($error as $er):?>
                    <div> <?php echo $er ?></div>
                <?php endforeach; ?>
            </div>
            <?php endif ?>


          <div class="main">   
            <main class="form-signin">
                <form class="form" method="post">
                    <h1 class="h3 mb-3 fw-normal">Please log in</h1>
                
                    <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" value="<?php echo $email?>" placeholder="f" name="email">
                    <label for="floatingInput">Email address</label>
                    </div><br>
                    <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
                    <label for="floatingPassword">Password</label>
                    </div> <br>
                    <button class="w-50 btn btn-lg btn-primary" type="submit">Log in</button>
                    <a href="signup.php" class="btn btn-outline-dark btn-lg" type="submit">Join</a>
                    <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>

                </form>
            </main>
    </div>
        
        
    </body>  




<script src="../web/js/bootstrap.bundle.min.js"></script>
</body>
</html>