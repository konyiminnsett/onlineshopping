<?php
session_start();
$name=$_POST['name'];
$password=$_POST['password'];
if ($name=="admin" and $password=="asdffdsa"){
    $_SESSION['auth']=true;
    header("location:welcomeadmin.php");
}else{
    header("location:index.php?login=failed");
}

?>