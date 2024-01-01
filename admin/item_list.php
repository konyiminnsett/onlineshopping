<?php
include("confs/auth.php");
include("confs/config.php");
$result = mysqli_query($conn, "SELECT all_items.*,categories.name FROM all_items LEFT JOIN categories ON all_items.category_id=categories.id ORDER BY all_items.reached_date DESC");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item List</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Add your custom styles here -->
    <style>
      body{
          background-image:linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229))
      }
    </style>
</head>
<body>


        <div class="container ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <div class="container mb-1">
                    <a class="navbar-brand" href="welcomeadmin.php">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
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
                </div>
            </nav>

        <h1 class="my-3 text-center">Item List</h1>
        <ul class="list-group">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <li class="list-group-item mb-3">
                    <img src="images/<?php echo $row['photo'] ?>" alt="" class="shadow mb-3" height="140">
                    <b style="margin-left:10px;"><?php echo $row['title'] ?></b>
                    <i>by <?php echo $row['brand'] ?></i>
                    <small>(in <?php echo $row['name'] ?></small>
                    <span>$<?php echo $row['price']  ?>)</span>
                    <div><?php echo $row['review'] ?></div>

                    [<a href="item_delete.php?id=<?php echo $row['id'] ?>" class="text-danger" onclick="return confirm('Are you sure')">del</a>]
                    [<a href="item_edit.php?id=<?php echo $row['id'] ?>">edit</a>]
                </li>
            <?php } ?>
        </ul>
        <a href="item_new.php" class="btn btn-primary m-3">New Item</a>
    </div>


</body>
</html>
