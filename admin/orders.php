<?php
include ("confs/auth.php");
include ("confs/config.php");
$orders_data = mysqli_query($conn,"SELECT * FROM orders");



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
<h1>Order List</h1>

<li class="orders">
    <?php while ($orders=mysqli_fetch_assoc($orders_data)){
        if ($orders['status']) {?>
    <li class="delivered">
        <?php } else {?>
    </li>
    <?php } ?>
    <div class="order">
        <b><?php echo $orders['name'];?></b>
        <i><?php echo $orders['email'];?></i>
        <span><?php echo $orders['phone'];?></span>
        <i><?php echo $orders['visa_card'];?></i>
        <p><?php echo $orders['address'];?></p>
        <p><?php echo $orders['received_date'];?></p>

        <?php if ($orders['status']){ ?>
        *<a href="order_status.php?id=<?php echo $orders['id']?>&staus=0">Undo</a>
        <?php } else { ?>
        * <a href="order_status.php?id=<?php echo $orders['id']?>&status=1">
            Mark as Delivered
        </a>

        <?php }?>

    </div>
    <div class="items">
        <?php
        $order_id=$orders['id'];
        $order_item=mysqli_query($conn,"SELECT order_items.*,all_items.title FROM order_items LEFT JOIN all_items ON order_items.item_id=all_items.id WHERE order_items.order_id=$order_id") or die(mysqli_error());
        while($items=mysqli_fetch_assoc($order_item)){

        ?>
        <b>
            <a href="adminitem_detail.php?id=<?php echo $items['item_id'];?>">
                <?php echo $items['title']; ?>
            </a>
            (<?php echo $items['qty']; ?>)
        </b>
        <?php } ?>
    </div>
</li>

<?php } ?>

</li>


</ul>

</body>
</html>
