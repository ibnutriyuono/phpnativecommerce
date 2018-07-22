<?php

session_start();
include '../../config/conn.php';

/* if ($conn) {
     echo "XD";
}*/ 

$username = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

$data = mysqli_query($conn,
        "SELECT * FROM user WHERE username_user = '$username'
        AND password_user = '$pass'"
);

$check = mysqli_num_rows($data);

$data2 = mysqli_query($conn,
        "SELECT * FROM admin WHERE username_admin = '$username'
        AND password_admin = '$pass'"
);

$check2 = mysqli_num_rows($data2);


if ($check>0) {
    $_SESSION['username'] = $username;
    $_SESSION['statususer'] = "login";
    // echo "Logged in as ".$username;
    header("location:../../index.php?pesan=login");
}else if ($check2>0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    // echo "Logged in as ".$username;
    header("location:../../admin/dashboard/index.php");
}

else{
    header("location:../../index.php?page=login&pesan=gagal");
}

?>
