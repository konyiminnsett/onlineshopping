<?php
include ("confs/auth.php");
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

<h1>Category List</h1>
<?php
    echo "San Mal";
   include ("confs/config.php");
    $result=mysqli_query($conn,"SElECT * FROM categories");
?>
<ul class="list">
    <?php while ($row=mysqli_fetch_assoc($result)) { ?>
    <li title="<?php echo $row['remark']?>">
    [ <a href="cat_delete.php?id=<?php echo $row['id']?>" class="del" onclick=" return confirm('Are you sure?') ">del</a> ]
    [ <a href="cat_edit.php?id<?php echo $row['id']?>" class="edit" >edit</a>]
    <?php echo $row['name']?>

</li>
<?php }?>
</ul>

<a href="cat_new.php">New Category</a>
<br style="clear:both">


</body>
</html>