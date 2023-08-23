<?php
    session_start();

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY pro_id ');
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        //hamza.php?id=<?php echo $p1['id'] //delete.php?id=<?php echo $p1['id'] 

    include_once('header_admin.php');

   

?>
<section class="main">
    
    <div class="list">
        <ul class="ullist">
            <li><a href="adminC.php">Customers</a></li>
            <li><a style="color:tomato;" href="adminP.php">Products</a></li>
            <li><a href="adminO.php">Orders</a></li>
            <li><a href="adminS.php">Settings</a></li>
        </ul>
    </div>
    <div class="mdl">
        

    <h1>Products Crud</h1>
      
    <a href="add_products.php" class="btn btn-success BTN1"> Create Product</a> <br>
      
    <form class="d-flex">
           
    </form>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">Name</th>
            <th scope="col">price</th>
            <th scope="col">type</th>
            <th scope="col">brand</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($products as  $p1): ?>
                <tr>
                <th class="h" scope="row"><?php echo $p1['pro_id'] ?></th>
                <td>
                    <img  style="width: 40px; "   src="../web/<?php echo $p1['pro_image'] ?>" >
                </td>
                <td><?php echo $p1['pro_name'] ?></td>
                <td><?php echo $p1['price'] ?> DH</td>
                <td><?php echo $p1['pro_type'] ?></td>
                <td><?php echo $p1['pro_brand'] ?></td>
                <td> 
                <a href="edit_products.php?id=<?php echo $p1['pro_id'] ?>" class="btn btn-sm btn-primary" type="button">Edit</a>
                <a href="delet_products.php?id=<?php echo $p1['pro_id'] ?>" class="btn btn-sm btn-danger" type="button">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
            
            
           
        </tbody>
    </table>



    </div>

</section>


<script src="../web/javascript/jquery-3.6.0.min.js"></script>
<script src="../web/javascript/admin.js"></script>
</body>
</html>