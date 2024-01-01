<?php
include ("confs/auth.php");
include ("confs/config.php");

$id = $_POST['id'];
$name = $_POST['name'];
$remark = $_POST['remark'];

$sql = "UPDATE categories SET name=?, remark=?, modified_date=now() WHERE id=?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ssi", $name, $remark, $id);

mysqli_stmt_execute($stmt);

if (mysqli_stmt_errno($stmt) !== 0) {
    echo "Error: " . mysqli_stmt_error($stmt);
} else {
    header("location: cat_list.php");
}

mysqli_stmt_close($stmt);

mysqli_close($conn);
?>
