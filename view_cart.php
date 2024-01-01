<?php
session_start();
if (!isset($_SESSION['cart'])){
    header("location:index.php");
    exit();
}
include ("admin/confs/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            background-image:linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));
        }
        .sidebar {
            background-color: #f8f9fa;
            padding: 15px;
        }

        .main {
            padding: 15px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1>View Cart</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                <ul class="cats">
                    <li><a href="index.php">&laquo; Continue Shopping</a></li>
                    <li><a href="clear_cart.php" class="del">&times; Clear Cart</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $id => $qty) {
                    $result=mysqli_query($conn,"SELECT title,price FROM all_items WHERE id=$id");
                    $row=mysqli_fetch_assoc($result);
                    $total +=$row['price']*$qty;
                    ?>
                    <tr>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $qty; ?></td>
                        <td>$<?php echo $row['price'];?></td>
                         <td>$<?php echo $row['price']*$qty;?></td>
                    </tr>

                <?php } ?>
                <tr>
                    <td colspan="3" align="right"><b>Total:</b></td>
                    <td><?php echo $total;?></td>
                </tr>
                </tbody>
            </table>

            <div class="order-form">
                <h2>Order Now</h2>
                <form action="submit_order.php" method="post">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="visa">Visa Card</label>
                        <input type="text" class="form-control" name="visa" id="visa">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Order</button>
                    <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="footer mt-5">
    &copy; <?php echo date("Y"); ?>. All rights reserved.
</div>


</body>
</html>
