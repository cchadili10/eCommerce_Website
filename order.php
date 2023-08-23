<?php
   $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   include_once("app/header1.php");
   if(empty($_SESSION['c_email'])){
    die();
    }


    $statement = $pdo->prepare('SELECT * FROM orders INNER JOIN products ON orders.pro_id = products.pro_id 
                                INNER JOIN users ON orders.user_id = users.user_id   WHERE users.user_id = :id');
    $statement->bindValue(':id',$_SESSION['user__id']);
    $statement->execute();
    $order =  $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //  echo $_SESSION['nbro'];
    //  echo $_SESSION['size'];
?>
<section class="ord">

    <div class="ordp1">
        <div class="">
            <h1> Account </h1>
            <p><?php echo $_SESSION['c_email'] ?></p>
        </div>
        <div class="">
            <h2>Orders#</h2>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                <tr>
                   <th>PRODUCT</th>
                   <th>PRICE</th>
                   <th>QUANTITY</th>
                   <th>DATE</th>
                   <th>ADDRESS</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php foreach($order as $ord): ?>
                <tr>
                   <td><?php echo $ord['pro_name'] ?></td>
                   <td><?php echo $ord['price'] ?></td>
                   <td><?php echo $ord['quantity'] ?></td>
                   <td><?php echo $ord['order_date'] ?></td>
                   <td><?php echo $ord['address'] ?></td>
                   <td> 
                    <a href="app/user/delet_item.php?id=<?php echo $ord['order_id'] ?>" class="btn btn-sm btn-danger" type="button">Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
                <tr class="align-bottom">
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="ordp2">
        <h1 class="toop">Shipping My Orders</h1>
        <button id="myBtn" onclick="document.getElementById('sms').style.visibility = 'visible'" class="btn btn-outline-primary btn-lg showw" type="submit">Complete Orders</button>

    </div>


</section>

<div id="sms">
    <h3>Your Order is Ready to be Shipped</h3>
</div>



<!-- <script>
document.getElementById("myBtn").onclick = displayD;

function displayD() {
  document.getElementById("demo").innerHTML = Date();
}
</script>  -->














<script src="app/web/javascript/index.js"></script>
<script src="app/web/javascript/jquery-3.6.0.min.js"></script>
<script src="app/web/js/bootstrap.bundle.min.js"></script>


</body>