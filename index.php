<?php
session_start();
include("admin/confs/config.php");
$cart = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
        $cart += $qty;
    }
}

if (isset($_GET['cat'])) {
    $cat_id = $_GET['cat'];
    $items = mysqli_query($conn, "SELECT * FROM all_items WHERE category_id=$cat_id");
} else {
    $items = mysqli_query($conn, "SELECT * FROM all_items");
}

if (isset($_GET['q'])) {
    $items = search_perform($_GET['q'], "items", "title");
}
$cats = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'courier new';
            background-image: linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));
            color: #495057;
        }

        #title {
            font-family: 'courier new';
        }

        .admininfo, .info {
            font-family: 'courier new';
            margin-left: 10px;
        }

        .sidebar {
            float: left;
            width: 20%;
            margin-top: 20px;
            position: sticky;
            top: 56px; /* Adjusted for fixed navbar */
        }

        .cats {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .cats li a {
            text-decoration: none;
            color: #007bff;
            margin-left: 10px;
            display: block;
            padding: .5rem 1rem;
            transition: background-color 0.3s;
        }

        .cats li a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .main {
            float: right;
            width: 75%;
            margin-top: 20px;
        }

        .items {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .items li {
            width: 30%;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #ffffff;
            box-sizing: border-box;
            margin-bottom: 50px;
            transition: box-shadow 0.3s;
        }

        .items li:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .items img {
            width: 100%;
            height: auto;
        }

        .footer {
            clear: both;
            text-align: center;
            padding: 10px;
            background-color: #343a40;
            color: #ffffff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1 id="title" class="ms-4">Online Shop</h1>
    <div class="admininfo">
        <a href="admin/index.php">Admin Login</a>
    </div>
    <div class="info">
        <a href="view_cart.php">(<?php echo $cart ?>) items in your cart</a>
    </div>
    <div class="sidebar">
        <ul class="cats">
            <li><b><a href="index.php">All items</a></b></li>
            <?php while ($row = mysqli_fetch_assoc($cats)): ?>
                <li>
                    <a href="index.php?cat=<?php echo $row['id']; ?>">
                        <?php echo $row['name']; ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="main">
        <ul class="items">
            <?php while ($row = mysqli_fetch_assoc($items)): ?>
                <li>
                    <?php !is_dir("admin/images/{$row['photo']}") and file_exists("admin/images/{$row['photo']}") ?>
                    <img src="admin/images/<?php echo $row['photo'] ?>" alt="" height="150">
                    <b>
                        <a href="item_detail.php?id=<?php echo $row['id'] ?>" >
                            <?php echo $row['title'] ?>
                        </a>
                    </b>
                    <i>$<?php echo $row['price'] ?></i>
                    <a href="add_to_cart.php?id=<?php echo $row['id'] ?>" class="add-to-cart">Add to Cart</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="footer">
        &copy;<?php echo date("Y"); ?>. All rights reserved.
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
