<?php
include ("confs/auth.php");
include ("confs/config.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul class="menu">
    <li><a href="welcomeadmin.php">Home</a></li>
    <li><a href="item_list.php">Manage Items</a></li>
    <li><a href="cat_list.php">Manage Categories</a></li>
    <li><a href="orders.php">Manage Orders</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<h1>Online Shop Administration</h1>
<img src="./images/Online_shop.jpeg" width="1100" height="500" alt="">
<div class="footer">
    &copy;<?php echo date("Y") ?>.All right reserved.
</div>

</body>
</html>
