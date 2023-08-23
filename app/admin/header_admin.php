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
<body>
    <!-- header -->
    <section class="head ">
        <div>
            <img src="imgs/menu.png" class="img1" alt="" srcset="">
        </div>
        <div class="logo">
            <h5><?php echo $_SESSION['email']; ?></h5>
        </div>
        <div  class="jkl">
            <a href="../../index.php" class="btn btn-primary btn-lg" type="button">log out</a>
        </div>
       
          
    </section>