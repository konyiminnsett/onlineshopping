<?php
include("confs/auth.php");
include("confs/config.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Shop Administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kalnia:wght@400;700&display=swap" rel="stylesheet">


    <style>
        .container-fluid{
            background-image:linear-gradient(to left, rgb(116, 235, 213), rgb(172, 182, 229));
        }
    </style>
</head>
<body>

<div class="container-fluid   w-full vh-100">
    <div class="row ">
        <div class="container mt-2">
            <div class="row justify-content-between">
            <h1 class="mb-0" style="font-family: 'Kalnia', serif;">Online Shop</h1>
        <ul class="menu navbar navbar-expand-lg   list-unstyled">
        <li class="nav-item active">
            <a class="nav-link text-light " href="welcomeadmin.php">Home <span class="sr-only">(current)</span></a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link text-white" href="item_list.php">Manage Items</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="cat_list.php">Manage Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="orders.php">Manage Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="logout.php">Logout</a>
        </li>
    </ul>
    <div class="row align-items-center">
        <div class="col-lg-5">
            <h1 class="mb-3 font-monospace">Order Products Faster  Easier</h1>
            <p class="mb-5 text-black-50">Order you favourite foods at any time and we will deliver them right to where you are.</p>
            <a href="#" class=" shadow-lg px-3 py-2 text-white text-decoration-none  rounded-pill" style="background-image:linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));"> Get Started </a>

        </div>
        <div class="col-lg-7">
        <img src="./images/online-shop.jpg" class=" w-100 rounded shadow  " alt="Online Shop Image ">

        </div>
    </div>




            </div>
        </div>

      

    </div>
</div>

<!-- <div class="container d-flex justify-content-between align-items-center mt-3">

</div>

<div class="container mt-3 ">
   
</div> -->

<!-- <div class="footer mt-2">
    &copy;<?php echo date("Y") ?>. All right reserved.
</div> -->



</body>
</html>
