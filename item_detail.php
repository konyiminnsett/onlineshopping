<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item Detail</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background-image:linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));
        }

        .detail {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            margin-top: 50px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
        }

        .add-to-cart {
            display: inline-block;
            padding: 8px 16px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center ">Item Detail</h1>

    <?php
    include("admin/confs/config.php");
    $id = $_GET['id'];
    $item = mysqli_query($conn,"SELECT * FROM all_items WHERE id=$id");
    $row = mysqli_fetch_assoc($item);
    ?>

    <div class="detail">
        <a href="index.php" class="btn btn-secondary d-flex justify-content-center w-25 mx-auto mb-5">&laquo; Back</a>
        <img src="admin/images/<?php echo $row['photo'] ?>" alt="" class="img-fluid mb-3 shadow rounded-3 w-50">
        <h2><?php echo $row['title']?></h2>
        <i>by <?php echo $row['brand']?></i>
        <<b>$<?php echo $row['price'] ?></b>
        <p><?php echo $row['review'] ?></p>
        <a href="add_to_cart.php?id=<?php echo $id ?>" class="btn btn-primary">Add to Cart</a>
    </div>

    <div class="footer">
        &copy; <?php echo date("Y") ?>. All rights reserved.
    </div>
</div>

</body>
</html>
