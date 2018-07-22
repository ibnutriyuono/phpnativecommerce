<?php
session_start();
include '../../config/conn.php';
require '../../function/user/validasi.php';
$title = mysqli_real_escape_string($conn, $_POST['title']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$stock = mysqli_real_escape_string($conn, $_POST['stock']);
$image = $_FILES['image']['name'];


if(number($price)){
    header("location:../../admin/dashboard/index.php?page=createmenu&pesan=hargasalah");
}elseif($stock < 0){
    header("location:../../admin/dashboard/index.php?page=createmenu&pesan=stocksalah");
}else{

$data = mysqli_query($conn, "INSERT INTO 
                posts (title,price,stock,image,username_admin) 
                VALUES('$title','$price','$stock','$image','admin')
");

move_uploaded_file($_FILES['image']['tmp_name'],'../../assets/images/post/'.$image);

header("location:../../admin/dashboard/index.php?pesan=created");
}
?>