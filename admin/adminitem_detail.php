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
<h1>Item Detail</h1>
<?php

include ("confs/config.php");
$id=$_GET['id'];
$item=mysqli_query($conn,"SELECT * FROM all_items WHERE id=$id");
$row=mysqli_fetch_assoc($item);
?>

<div class="detail">
    <a href="orders.php" class="back">&lanquo; Go Back</a>
    <img src="images/<?php echo $row['photo']?>" alt="">
    <h2><?php echo $row['title']?></h2>
    <i>by <?php echo $row['brand']?></i>
    <b>$<?php echo $row['price']?></b>
    <p><?php echo $row['review']?></p>
</div>
<div class="footer">
    &copy; <?php echo date("Y") ?>.All right reserved.
</div>

</body>
</html>