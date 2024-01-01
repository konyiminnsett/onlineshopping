<?php
session_start();
include("admin/confs/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $visa = $_POST['visa'];
    $address = $_POST['address'];
    $received = date('Y-m-d H:i:s', strtotime('+7 days', strtotime('now')));

    $insertOrderQuery = "INSERT INTO orders (name, email, phone, visa_card, address, status, ordered_date, received_date) VALUES ('$name', '$email', '$phone', '$visa', '$address', 0, NOW(), '$received')";
    mysqli_query($conn, $insertOrderQuery);

    $order_id = mysqli_insert_id($conn);

    foreach ($_SESSION['cart'] as $id => $qty) {
        $insertOrderItemsQuery = "INSERT INTO order_items (item_id, order_id, qty) VALUES ($id, $order_id, $qty)";
        mysqli_query($conn, $insertOrderItemsQuery);
    }

    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Submitted</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Order Submitted</h1>
                    </div>
                    <div class="card-body text-center">
                        <p>Your order has been submitted. We will deliver the items soon.</p>
                        <a href="index.php" class="btn btn-primary">Online Shop Home</a>
                    </div>
                    <div class="card-footer text-muted">
                        &copy;<?php echo date('Y'); ?>. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>
