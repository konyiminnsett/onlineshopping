<?php

include("confs/auth.php");
include("confs/config.php");
$result=mysqli_query($conn,"SELECT all_items.*,categories.name FROM all_items LEFT JOIN categories ON all_items.category_id=categories.id ORDER BY all_items.reached_date DESC");
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
        <li><a href="item_list.php">Manage items</a></li>
        <li><a href="cat_list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

<h1>Item List</h1>
<ul class="list">
    <?php while ($row=mysqli_fetch_assoc($result)){ ?>
    <li>
        <img src="images/<?php echo $row['photo']?>" alt="" align="right" height="140">
        <b><?php echo $row['title']?></b>
        <i>by <?php echo $row['brand']?></i>
        <small>(in <?php echo $row['name']?></small>
        <span>$<?php echo $row['price']?></span>
        <div><?php echo $row['review']?></div>

        [<a href="item_delete.php?id=<?php echo $row['id']?>" class="del" onclick="return confirm('Are you sure')">del</a>]
        [<a href="item_edit.php?id=<?php echo $row['id']?>">edit</a>
    </li>

    <?php }?>


</ul>
<a href="item_new.php" class="new">New Item</a>

</body>
</html>
