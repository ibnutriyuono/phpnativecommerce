<?php

session_start();
include '../../config/conn.php';

/* if ($conn) {
     echo "XD";
}*/ 

$username = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

// echo $username;
// echo $pass;
$data = mysqli_query($conn,
        "SELECT * FROM admin WHERE username_admin = '$username'
        AND password_admin = '$pass'"
);

$check = mysqli_num_rows($data);

if ($check>0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    // echo "Logged in as ".$username;
    header("location:../../admin/dashboard/index.php");
}else{
    header("location:../../index.php?pesan=gagal");
}

?>