<?php
    session_start();
    include 'config/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RaiRaka</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <nav class="teal">
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">RaiRakaCatering</a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="index.php?page=produk">
                        <i class="material-icons left">computer</i>List Produk</a>
                </li>
                <li>
                    <a href="index.php?page=cart">
                        <i class="material-icons left">shopping_cart</i>Cart</a>
                </li>
                <?php if (empty($_SESSION['statususer'])):?>
                <li>
                    <a href="index.php?page=login">
                        <i class="material-icons left">chevron_right</i>Masuk atau Daftar
                    </a>
                </li>
                <?php endif;?>
                <?php if (!empty($_SESSION['statususer'])):?>
                <li>
                    <a href="function/user/logout.php"><i class="material-icons left">chevron_left</i>Logout
                   </a>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </nav>

    