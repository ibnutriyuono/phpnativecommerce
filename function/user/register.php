<?php
session_start();
include '../../config/conn.php';
require 'validasi.php';

$name_user = mysqli_real_escape_string($conn, $_POST['name']);
$username_user = mysqli_real_escape_string($conn, $_POST['username']);
$password_user = mysqli_real_escape_string($conn, $_POST['password']);
$password_user_retype = mysqli_real_escape_string($conn, $_POST['password2']);
$email_user = mysqli_real_escape_string($conn, $_POST['email']);

$cek_username=mysqli_query($conn, "SELECT * FROM user where username_user='$username_user'");
$cek_email=mysqli_query($conn, "SELECT email_user FROM user where email_user='$email_user'");

if(mysqli_num_rows($cek_username) > 0 ){
    header("location:../../index.php?page=register&pesan=gagalusername");
}elseif ((strlen($password_user) < 8) || pass($password_user)) {
    header("location:../../index.php?page=register&pesan=gagalpass2");
}elseif ($password_user != $password_user_retype) {
    header("location:../../index.php?page=register&pesan=gagalpass");
}elseif(huruf($name_user)){
    header("location:../../index.php?page=register&pesan=gagalname");
}elseif (mysqli_num_rows($cek_email) > 0 ){  
    header("location:../../index.php?page=register&pesan=gagalemail");
}else{

    $data = mysqli_query($conn, "INSERT INTO 
                                user (username_user,password_user,email_user,name_user) 
                                VALUES('$username_user','$password_user','$email_user','$name_user')
                    ");

    if ($data) {
        $_SESSION['username']=$username_user;
        $_SESSION['statususer']='login';
        header("location:../../index.php?pesan=registered");
    }
}
?>