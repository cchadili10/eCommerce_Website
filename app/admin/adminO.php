<?php
    session_start();

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    include_once('header_admin.php');
    $statement = $pdo->prepare('SELECT * FROM orders INNER JOIN products ON orders.pro_id = products.pro_id 
        INNER JOIN users ON orders.user_id = users.user_id ');
    $statement->execute();
    $order =  $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="main">
    
    <div class="list">
        <ul class="ullist">
            <li><a href="adminC.php">Customers</a></li>
            <li><a   href="adminP.php">Products</a></li>
            <li ><a style="color:tomato;" href="adminO.php">Orders</a></li>
            <li><a href="adminS.php">Settings</a></li>
        </ul>
    </div>
    <div class="mdl">
    <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                <tr>
                   <th colspan="2">CLIENT NAME</th>
                   <th>CLIENT EMAIL</th>
                   <th>PRODUCT NAME</th>
                   <th>PRICE</th>
                   <th>QUANTITY</th>
                   <th>DATE</th>
                   <th>ADDRESS</th>
                   <th>Phone Number</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php foreach($order as $ord): ?>
                <tr>
                    <td>*<?php echo $ord['user_Fname'] ?></td>
                    <td><?php echo $ord['user_Lname'] ?></td>
                    <td>*<?php echo $ord['user_email'] ?></td>
                    <td>*<?php echo $ord['pro_name'] ?></td>
                    <td>*<?php echo $ord['price'] ?>DH</td>
                    <td>*<?php echo $ord['quantity'] ?></td>
                    <td>*<?php echo $ord['order_date'] ?></td>
                    <td>*<?php echo $ord['address'] ?></td>
                    <td>*<?php echo $ord['phone'] ?></td>
                </tr>
                <?php endforeach ?>
                <tr class="align-bottom">
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>


<script src="../web/javascript/jquery-3.6.0.min.js"></script>
<script src="../web/javascript/admin.js"></script>
</body>
</html>