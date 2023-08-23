<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    include_once('header_admin.php');
    $admin = $pdo->prepare('SELECT * FROM admins WHERE admin_id = :id');
    $admin->bindValue(':id' , $_SESSION['admin_id']);
    $admin->execute();
    $ad = $admin->fetch(PDO::FETCH_ASSOC);
?>
<section class="main">
    
    <div class="list">
        <ul class="ullist">
            <li><a href="adminC.php">Customers</a></li>
            <li><a href="adminP.php">Products</a></li>
            <li><a href="adminO.php">Orders</a></li>
            <li><a style="color:tomato;" href="adminS.php">Settings</a></li>
        </ul>
    </div>
    <div class="mdl">
    <section class="cb4">

<h1 class="d1"> Settings</h1>
<h2>Personnel Information</h2>
<div class="bar">
    <div class="bar1 ">
        <p >EMAIL</p>
        <p>FIRST NAME</p>
        <p>LAST NAME</p>
        <P>PASSWORD</P>
    </div>
    <div class="bar1 ">
        <p><?php echo $ad['admin_Fname'] ?></p>
        <p><?php echo $ad['admin_Lname'] ?></p>
        <p><?php echo $ad['admin_email'] ?></p>
        <P ><?php echo $ad['admin_pass'] ?> </P>
    </div>
</div>
<div class="set">
    <a href="edite_admin.php"  class="btns btns1 " type="submit">Edit my Account</a>
    <a href="add_admin.php"  class="btns btns2 " type="submit">Add Another Account</a>

</div>

</section>
    </div>

</section>




<script src="../web/javascript/jquery-3.6.0.min.js"></script>
<script src="../web/javascript/admin.js"></script>
</body>
</html>