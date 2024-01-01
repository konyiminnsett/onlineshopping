<?php
include ("confs/auth.php");
include ("confs/config.php");
$orders_data = mysqli_query($conn, "SELECT * FROM orders");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order List</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body{
            background-image:linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));
        }

        .orders {
            margin-bottom: 20px;
        }

        .delivered {
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .order {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .items {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="welcomeadmin.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-primary " href="item_list.php">Manage Items</a>
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
    <h1>Order List</h1>

    <?php while ($orders = mysqli_fetch_assoc($orders_data)) { ?>
        <div class="orders p-3  <?php echo $orders['status'] ? 'delivered' : ''; ?>">
            <div class="order">
                <b><?php echo $orders['name']; ?></b>
                <i><?php echo $orders['email']; ?></i>
                <span><?php echo $orders['phone']; ?></span>
                <i><?php echo $orders['visa_card']; ?></i>
                <p><?php echo $orders['address']; ?></p>
                <p><?php echo $orders['received_date']; ?></p>

                <?php if ($orders['status']) { ?>
                    *<a href="order_status.php?id=<?php echo $orders['id'] ?>&status=0">Undo</a>
                <?php } else { ?>
                    * <a href="order_status.php?id=<?php echo $orders['id'] ?>&status=1">
                        Mark as Delivered
                    </a>
                <?php } ?>
            </div>

            <div class="items">
                <?php
                $order_id = $orders['id'];
                $order_item = mysqli_query($conn, "SELECT order_items.*,all_items.title FROM order_items LEFT JOIN all_items ON order_items.item_id=all_items.id WHERE order_items.order_id=$order_id") or die(mysqli_error());
                while ($items = mysqli_fetch_assoc($order_item)) {
                    ?>
                    <b>
                        <a class="p-2" href="adminitem_detail.php?id=<?php echo $items['item_id']; ?>">
                            <?php echo $items['title']; ?>
                        </a>
                        (<?php echo $items['qty']; ?>)
                    </b>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>



</body>
</html>
