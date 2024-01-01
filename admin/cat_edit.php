<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image:linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));
        }
    </style>
</head>
<body>

<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <a class="nav-link" href="welcomeadmin.php">Home</a>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-primary" href="item_list.php">Manage Items</a></li>
                <li class="nav-item"><a class="nav-link text-primary" href="cat_list.php">Manage Categories</a></li>
                <li class="nav-item"><a class="nav-link text-primary" href="orders.php">Manage Orders</a></li>
                <li class="nav-item"><a class="nav-link text-primary" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
</div>

<div class="container mt-4">
    <h1>Edit Category</h1>

    <?php
    include("confs/config.php");
    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM categories WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    ?>

    <form action="cat_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name'] ?>">
        </div>

        <div class="mb-3">
            <label for="remark" class="form-label">Remark</label>
            <textarea name="remark" id="remark" class="form-control"><?php echo $row['remark'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies (add at the end of the body for faster page loading) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
