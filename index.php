

<?php

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=project_tdm','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare('SELECT * FROM products ORDER BY pro_id ');
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //  include('app/connection.php')
     include_once('app/header.php');

?>

   <section class=" main " id="home">
           <div class="mainText">
               <h1>The world's largest Shoes marketplace</h1>
               <p class="text"> Shoes store is your place for athletic and easygoing shoes for the entire family from many name brands.<br>
                You’ll discover styles for ladies, men and childrenfrom brands 
                like Nike, Converse, Vans,<br>  Sperry, Madden Girl, Skechers, ASICS and then some!</p>
                <a href="#i_tems" type="button" class="btn  btn-lg btn1">Shop Now</a>
            </div>
           <div class=""> <img src="app/web/images/main.png" class="mainimg" alt="" srcset=""></div>

   </section>

    <!-- brand -->


   <section class="brand " id="braand">
       <div class="">
            <h1 class="display-1 bra"> Brands</h1>
            <form action="">
                <div class="cont">
                    <div class="brands">
                        <img class="brandimag" src="app/web/images/brand/categories.png">
                        <a href="boody.php?id=All" class="btn  btn-lg btn1" type="submit">MORE</a>
                        
                    </div>
                    <div class="brands">
                        <img class="brandimag" src="app/web/images/brand/Nike-Logo.png">
                        <a href="boody.php?id=Nike" class="btn  btn-lg btn1" type="submit">MORE</a>
                        
                    </div>
                    <div class="brands">
                        <img class="brandimag" src="app/web/images/brand/puma-logo.png">
                        <a href="boody.php?id=Puma" class="btn  btn-lg btn1" type="submit">MORE</a>
                        
                    </div>
                    <div class="brands">
                        <img class="brandimag" src="app/web/images/brand/Adidas_logo.png">
                        <a href="boody.php?id=Adidas" class="btn  btn-lg btn1" type="submit">MORE</a>
                        
                    </div>

                </div>
            </form>
        </div>
   </section>


    <!-- items -->
    <?php

        include_once('boody.php')
    
    ?>
   





    <script src="app/web/index.js"></script>
    <script src="app/web/js/bootstrap.bundle.min.js"></script>
</body>
</html>