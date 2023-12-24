<?php
session_start();
include("admin/confs/config.php");
$cart=0;
if (isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $qty){
        $cart +=$qty;
    }

}

if (isset($_GET['cat'])){
    $cat_id=$_GET['cat'];
    $items=mysqli_query($conn,"SELECT * FROM all_items WHERE category_id=$cat_id");
}else{
    $items=mysqli_query($conn,"SELECT * FROM all_items");

}

if (isset($_GET['q'])){
    $items=search_perform($_GET['q'],"items","title");

}
$cats=mysqli_query($conn,"SELECT * FROM categories");




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
<h1 id="title" style="font-family: 'courier new';">Online Shop</h1>
<div class="admininfo">
    <a href="admin/index.php" style="font-family: 'courier new';">
        Admin Login
    </a>
</div>
<div class="info">
    <a href="view_cart.php">
        (<?php echo $cart ?>)items in your cart
    </a>
</div>
<div class="sidebar">
    <ul class="cats">
        <li>
            <b><a href="index.php">All items</a></b>
        </li>
        <?php while ($row=mysqli_fetch_assoc($cats)){?>
        <li>
            <a href="index.php?cat=<?php echo $row['id'];?>">
                <?php echo $row['name'];?>
            </a>
        </li>
        <?php } ?>
    </ul>
</div>
<div class="main">
    <ul class="items">
        <?php while ($row=mysqli_fetch_assoc($items)):?>
        <li>
            <?php !is_dir("admin/images/{$row['photo']}") and file_exists("admin/images/{$row['photo']}")?>
            <img src="admin/images/<?php echo $row['photo']?>" alt="" height="150">
            <b>
                <a href="item_detail.php?id=<?php echo $row['id']?>">
                    <?php echo $row['title']?>
                </a>
            </b>
            <i>$<?php echo $row['price']?></i>
            <a href="add_to_cart.php?id=<?php echo $row['id'] ?>" class="add-to-cart">
                Add to Cart
            </a>
        </li>
        <?php endwhile;?>
    </ul>
</div>
<div class="footer">
    &copy;<?php echo date("Y")?>.All right reserved.
</div>

</body>
</html>