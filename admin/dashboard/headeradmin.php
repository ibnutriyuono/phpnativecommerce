<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<link rel="stylesheet" href="../../assets/css/main.css">

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

	<nav>
		<div class="nav-wrapper teal">
			<a href="index.php" class="brand-logo">
				<i class="material-icons">cloud</i>AdminRaiRaka</a>
			<ul class="right hide-on-med-and-down">
				<li>
					<a href="index.php?page=ordermasuk" class="tooltipped" data-position="bottom" data-tooltip="Lihat Order">
						<i class="material-icons left">person_add</i>Lihat Order
					</a>
				</li>
				<li>
					<a href="index.php?page=datacustomer" class="tooltipped" data-position="bottom" data-tooltip="Data Customer">
						<i class="material-icons left">add_to_queue</i>Data Customer
					</a>
				</li>
				<li>
					<a href="index.php?page=createmenu" class="tooltipped" data-position="bottom" data-tooltip="Tambah Menu">
						<i class="material-icons left">add_to_queue</i>Tambah Data
					</a>
				</li>
				<li>
					<a href="index.php?page=cetak" target="_blank" class="tooltipped" data-position="bottom" data-tooltip="Cetak Data">
						<i class="material-icons left">print</i>Cetak Data Order
					</a>
				</li>
				<li>
					<a href="../../function/admin/logout.php" class="tooltipped" data-position="bottom" data-tooltip="Logout">
						<i class="material-icons left">chevron_left</i>Logout
					</a>
				</li>
			</ul>
		</div>
	</nav>