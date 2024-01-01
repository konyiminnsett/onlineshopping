<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body{
            background-image: linear-gradient(to right, rgb(211, 204, 227), rgb(233, 228, 240));
        }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <a class="nav-link text-dark" href="welcomeadmin.php">Home</a>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="item_list.php">Manage Items</a>
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

<div class="container mt-4">
    <h1 class="my-3">New Category</h1>
    <form action="cat_add.php" method="post">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="remark">Remark</label>
            <textarea class="form-control" name="remark" id="remark"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>



</body>
</html>
