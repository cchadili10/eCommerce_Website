<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/web/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/web/cssP/index.css">

    


    <title>shose</title>
</head>
<body>
    <!-- header -->
    <section class="head ">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container-fluid kin ">
                    <div>

                        <img class="logo" src="app/web/images/logo.png" alt="" srcset="">
                        <a class="navbar-brand" href="../ShosePro/index.php">Shoes store</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="kin">
                        <div class="collapse navbar-collapse navo"  id="navbarSupportedContent">
                            <ul class="navbar-nav  mb-3 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#braand">Brand</a>
                                </li>
                                <li class="nav-item"> <a href="#i_tems" class="nav-link">Items</a></li>
                                <li class="nav-item"> <a href="#" class="nav-link">About Us</a></li>
                            </ul>
                            <!-- <form class="d-flex">
                                <input class="form-control me-2" type="search" name="search" placeholder="Search">
                                <button class="btn btn-outline-success hh"  type="submit">Search</button>
                            </form> -->
                            <form class="logg d-flex mr align-items-center">
                                <?php if(!empty($_SESSION['c_email'])): ?>
                                <!-- <a href="app/session.php" class="btn btn-primary btn-sm" type="submit">Log out</a> -->
                                <div class="dropdown" style="margin-right: 30px;">
                                        <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                          Mr.  <?php echo $_SESSION['c_name'] ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="order.php">My orders</a></li>
                                            <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                                            <li><a class="dropdown-item" href="app/session.php"  type="submit">Log out</a></li>
                                        </ul>
                                    </div>
                                
                                <?php endif ?>
                                <?php if(empty($_SESSION['c_email'])): ?>
                                <a href="app/log/login.php" class="btn btn-primary btn-sm" type="submit">Log in</a>
                                
                                <?php endif ?>

                            </form>
                        </div>
                    </div>
                </div>
            </nav>
    </section>