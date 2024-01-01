<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item Detail</title>
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
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Item Detail</h1>

    <?php
    include("confs/config.php");
    $id = $_GET['id'];
    $item = mysqli_query($conn, "SELECT * FROM all_items WHERE id=$id");
    $row = mysqli_fetch_assoc($item);
    ?>

    <div class="detail">
        <a href="orders.php" class="btn btn-secondary mx-auto my-3 d-flex w-25 justify-content-center">&laquo; Go Back</a>
        <img src="images/<?php echo $row['photo'] ?>" alt="" class="img-fluid w-50 shadow rounded-3 mb-2">
        <h2><?php echo $row['title'] ?></h2>
        <p><i>by <?php echo $row['brand'] ?></i></p>
        <p><b>$<?php echo $row['price'] ?></b></p>
        <p><?php echo $row['review'] ?></p>
    </div>

    <div class="footer">
        &copy; <?php echo date("Y") ?>. All rights reserved.
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
