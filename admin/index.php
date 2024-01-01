<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kalnia:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));
            background-color: #f8f9fa;
        }

        .container {
            width:500px;
            background-color:transparent;
            border:1px solid white;
            border-radius: 10px;
            padding: 40px;
            margin-top: 50px;
        }

        h2 {
          color:white;
          font-family: 'Kalnia', serif;

        }

        .form-group label {
            color: #343a40;
        }

        .form-control {
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container shadow-lg">
        <h2 class="text-center ">Login to Online Shop Administration</h2>

        <?php if (isset($_GET['login']) and $_GET['login'] == "failed"): ?>
            <div class="alert alert-danger">Login failed! User name or password incorrect.</div>
        <?php endif; ?>

        <div class="p-md-4">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="name" class="text-black">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="form-group mb-5">
                    <label for="password" class="text-black">Password</label>
                    <input type="password" class="form-control " id="password" name="password" required>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Admin Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   
</body>
</html>
