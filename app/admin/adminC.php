<?php

    session_start();

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $statement = $pdo->prepare('SELECT * FROM users ORDER BY user_id ');
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    include_once('header_admin.php')
?>
<section class="main">
    
    <div class="list">
        <ul class="ullist">
            <li><a style="color:tomato;" href="adminC.php">Customers</a></li>
            <li><a href="adminP.php">Products</a></li>
            <li><a href="adminO.php">Orders</a></li>
            <li><a href="adminS.php">Settings</a></li>
        </ul>
    </div>
    <div class="mdl">
        

    <h1>User Table</h1>
      
      
    <form class="d-flex">
            <input class="form-control me-3" name="search" type="search" placeholder="Search" >
            <button class="btn btn-outline-success"  type="submit">Search</button>
    </form>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($users as  $u1): ?>
                <tr>
                <th class="h" scope="row"><?php echo $u1['user_id'] ?></th>
                <td>
                    <img  style="width: 40px; "   src="../web/images/pro/user.png" >
                </td>
                    <td><?php echo $u1['user_Fname'] ?></td>
                    <td><?php echo $u1['user_Lname'] ?></td>
                    <td><?php echo $u1['user_email'] ?></td>
                    <td><?php echo $u1['address'] ?></td>
                    <td>+212<?php echo $u1['phone'] ?></td>
                <td> 
                    <a href="" class="btn btn-sm btn-danger" type="button">Delete</a>
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