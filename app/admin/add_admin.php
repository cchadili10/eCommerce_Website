<?php   
    session_start();




    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dellac = $pdo->prepare('SELECT * FROM admins WHERE admin_id = :id');
    $dellac->bindValue(':id',$_SESSION['admin_id']);
    $dellac->execute();
    $statement = $dellac->fetch(PDO::FETCH_ASSOC);
    $id = $_SESSION['admin_id'];

    include_once('../log/log.header.php');




    if($_SERVER['REQUEST_METHOD']==='POST'){
        $fname =$_POST['Name'];
        $lname =$_POST['lname'];
        $email =$_POST['email'];
        $pass = $_POST['pass'];
        if(empty($fname) || empty($lname) || empty($pass)){
            $erorr='Please Complete the form';
        }else{
            $statement = $pdo->prepare("INSERT INTO admins(admin_Fname, admin_Lname, admin_email, admin_pass)
            VALUES(:fname,:lname,:email,:pass)");
            $statement->bindValue(':fname',$fname);
            $statement->bindValue(':lname',$lname);
            $statement->bindValue(':email',$email);
            $statement->bindValue(':pass',$pass);
            $statement->execute();
            header('Location: adminS.php');}
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

                    
                    <h1 class="h3 mb-3 fw-normal">Add Admin</h1>
                    <div class="form-floating mrn">
                        <input type="text" name="Name" class="form-control" id="floatingInput"  placeholder="f" >
                        <label for="floatinInput">First Name</label>
                        
                    </div>
                    <div class="form-floating mrn">
                        <input type="text" class="form-control" id="floatingInput"   placeholder="f" name="lname">
                        <label for="floatingInput">Last Name</label>
                    </div>

                    <div class="form-floating mrn">
                        <input type="email" class="form-control" id="floatingInput"   placeholder="f" name="email" >
                        <label for="floatingInput">Email address</label>
                    </div>
                 
                    <div class="form-floating mrn">
                        <input type="password" class="form-control" id="floatingPassword"   placeholder="Password" name="pass">
                        <label for="floatingPassword">Password</label>
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