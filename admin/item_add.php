<?php

include("confs/auth.php");
include("confs/config.php");

// Escape user inputs to prevent SQL injection
$title = mysqli_real_escape_string($conn, $_POST['title']);
$brand = mysqli_real_escape_string($conn, $_POST['brand']);
$review = mysqli_real_escape_string($conn, $_POST['review']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
$photo = mysqli_real_escape_string($conn, $_FILES['photo']['name']);
$tmp = $_FILES['photo']['tmp_name'];

$expired_date = date('Y-m-d H:i:s', strtotime("+3 months", strtotime("now")));

if ($photo) {
    move_uploaded_file($tmp, "images/$photo");
}

// Use prepared statement to prevent SQL injection
$sql = "INSERT INTO all_items (title, brand, review, price, photo, category_id, reached_date, expired_date) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)";

$stmt = mysqli_prepare($conn, $sql);

// Bind parameters to the statement
mysqli_stmt_bind_param($stmt, "ssssssi", $title, $brand, $review, $price, $photo, $category_id, $expired_date);

// Execute the statement
mysqli_stmt_execute($stmt);

// Check for errors
if (mysqli_stmt_errno($stmt) !== 0) {
    // Handle the error, for example, redirect to an error page
    echo "Error: " . mysqli_stmt_error($stmt);
} else {
    // Redirect to the item list page upon success
    header("location: item_list.php");
}

// Close the statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);

?>
