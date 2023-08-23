<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    include_once('app/header1.php');
    $client = $pdo->prepare('SELECT * FROM users WHERE user_id = :id');
    $client->bindValue(':id' , $_SESSION['user__id']);
    $client->execute();
    $ct = $client->fetch(PDO::FETCH_ASSOC);
?>

<section class="cb4">

    <h1 class="d1"> Settings</h1>
    <h2>Personnel Information</h2>
    <div class="bar">
        <div class="bar1 ">
            <p >EMAIL</p>
            <p>FIRST NAME</p>
            <p>LAST NAME</p>
            <p>ADDRESS</p>
            <p>PHONE NUMBER</p>
            <P>PASSWORD</P>
        </div>
        <div class="bar1 ">
            <p><?php echo $ct['user_email'] ?></p>
            <p><?php echo $ct['user_Fname'] ?></p>
            <p><?php echo $ct['user_Lname'] ?></p>
            <p><?php echo $ct['address'] ?></p>
            <p><?php echo $ct['phone'] ?></p>
            <P><?php echo $ct['user_pass'] ?></P>
        </div>
    </div>
    <div class="set">
        <a href="app/user/update_user.php"  class="btns btns1 " type="submit">Edit my Account</a>
        <a href="app/user/delet_user.php"  class="btns btns2 " type="submit">Delete my Account</a>

    </div>
  
</section>
















<script src="app/web/javascript/index.js"></script>
<script src="app/web/javascript/jquery-3.6.0.min.js"></script>
<script src="app/web/js/bootstrap.bundle.min.js"></script>


</body>