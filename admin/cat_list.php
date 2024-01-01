<?php
include("confs/auth.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category List</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
      body{
          background-image: linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));
      }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="welcomeadmin.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="item_list.php">Manage items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="cat_list.php">Manage Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="orders.php">Manage Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

</div>
<div class="container mt-3">
    <h1>Category List</h1>
    <?php
    include("confs/config.php");
    $result = mysqli_query($conn, "SELECT * FROM categories");
    ?>
    <ul class="list-group">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <li class="list-group-item" title="<?php echo $row['remark'] ?>">
                [ <a href="cat_delete.php?id=<?php echo $row['id'] ?>" class="text-danger" onclick="return confirm('Are you sure?')">del</a> ]
                [ <a href="cat_edit.php?id=<?php echo $row['id'] ?>" class="text-primary ">edit</a> ]
                <?php echo $row['name'] ?>
            </li>
        <?php } ?>
    </ul>

    <a href="cat_new.php" class="btn btn-primary mt-3">New Category</a>
</div>



</body>
</html>
