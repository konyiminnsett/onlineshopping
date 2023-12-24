<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Category</title>
</head>
<body>

<ul class="menu">
    <li><a href="welcomeadmin.php">Home</a></li>
    <li><a href="item_list.php">Manage items</a></li>
    <li><a href="cat_list.php">Manage Categories</a></li>
    <li><a href="orders.php">Manage Orders</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>





<h1>New Category</h1>
<form action="cat_add.php" method="post">
    <label for="name">Category Name</label>
    <input type="text" name="name" id="name">

    <label for="remark">Remark</label>
    <textarea name="remark" id="remark" ></textarea>

    <br><br>
    <input type="submit" value="Add Category">
</form>

</body>
</html>