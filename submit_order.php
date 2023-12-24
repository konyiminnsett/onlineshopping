<?php

session_start();
include ("admin/confs/config.php");
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$visa=$_POST['visa'];
$address=$_POST['address'];
$received=date('Y-m-d H:m:s',strtotime('+7days',strtotime('now')));
mysqli_query($conn,"INSERT INTO orders(name,email,phone,visa_card,address,status,ordered_date,received_date) VALUES ('$name','$email','$phone','$visa','$address',0,now(),'$received')");
$order_id=mysqli_insert_id($conn);
foreach ($_SESSION['cart'] as $id=>$qty){
    mysqli_query($conn,"INSERT INTO order_items(item_id,order_id,qty) VALUES($id,$order_id,$qty) ");
}

unset($_SESSION['cart']);
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
<h1>Order Submitted</h1>
<div class="msg">
    Your order is submitted.We will deliever the items soon.
    <a href="index.php">Online Shop Home</a>
</div>
<div class="footer">
    &copy;<?php echo date('Y'); ?>.All Right Reserved.
</div>

</body>
</html>









?>