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
    <?php
    include '../../config/conn.php';
    
    $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY id_post DESC");
    if($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "hargasalah"){
                echo '<script>swal({
                    title: "Input Harga Salah",
                    text: "Harga hanya boleh angka!",
                    icon: "error",
                    button: "Kembali",
                  });</script>';
            }else if($_GET['pesan'] == "stocksalah"){
                echo '<script>swal({
                    title: "Input Stock Salah",
                    text: "Stock tidak boleh minus",
                    icon: "error",
                    button: "Kembali",
                  });</script>';
            }
        }

    ?>	

	<nav>
		<div class="nav-wrapper teal">
			<a href="index.php" class="brand-logo">
				<i class="material-icons">cloud</i>AdminRaiRaka</a>
			<ul class="right hide-on-med-and-down">
				<li>
                    <a href="index.php" class="tooltipped" data-position="bottom" data-tooltip="Tambah Menu">
                        <i class="material-icons left">chevron_left</i>Kembali
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

	<!-- <p><a href="../../admin/dashboard/index.php">Beranda</a> / <a href="createmenu.php">Tambah Data</a></p>	 -->

	<div class="container">
		<div class="section">
			<div class="row">
				<h2>Edit Data</h2>
				<?php
	error_reporting(0);
	
	include '../../config/conn.php';
	
	$id = $_GET['id']; 
	$rawquery = "SELECT * FROM posts WHERE id_post='%s'";
	$query = sprintf($rawquery, mysqli_real_escape_string($conn,$id));
	$show = mysqli_query($conn,$query);

	if(mysqli_num_rows($show) == 0){
	
		echo '<script>window.history.back()</script>';
		
	}else{
		$data = mysqli_fetch_assoc($show);
		$img = $data['image'];
		}
	?>
					<form action="../../function/admin/edit.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="img" value="<?php echo $img; ?>">
						<table cellpadding="3" cellspacing="0">
							<tr>
								<td>Title</td>
								<td>:</td>
								<td>
									<input type="text" name="title" value="<?php echo $data['title']; ?>" required>
								</td>
								<!-- value diambil dari hasil query -->
							</tr>
							<tr>
								<td>Price</td>
								<td>:</td>
								<td>
									<input type="text" name="price" value="<?php echo $data['price']; ?>" required>
								</td>
								<!-- value diambil dari hasil query -->
							</tr>
							<tr>
								<td>Stock</td>
								<td>:</td>
								<td>
									<input type="number" name="stock" value="<?php echo $data['stock']; ?>" required>
								</td>
							</tr>
							<tr>
								<td>Image</td>
								<td>:</td>
								<td>
									<img src="../../assets/images/post/<?php echo $img; ?>" width=100 border=1 alt="<?php echo $img; ?>">
									<br>
									<input type="file" name="image">
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td></td>
								<td>
									<input type="submit" name="simpan" value="Simpan">
								</td>
							</tr>
						</table>
					</form>
			</div>
		</div>
	</div>

	<footer class="page-footer teal">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Tentang Kami</h5>
                    <p class="grey-text text-lighten-4">
                        Kami adalah Perusahaan Catering yang menyediakan berbagai menu berkualitas, dengan harga cukup murah. </p>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Kontak Kami</h5>
                    <ul>
                        <li>
                            <a class="white-text" href="#">Tentang Kami</a>
                        </li>
                        <li>
                            <a class="white-text" target="_blank" href=" https://wa.me/6281312923780?text=Saya%20tertarik%20untuk%20membeli%20laptop%20di%20toko%20anda">Hubungi Kami</a>
                        </li>
                        <li>
                            <a class="white-text" href="#">FAQ</a>
                        </li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Lokasi</h5>
                    <ul>
                        <p class="grey-text text-lighten-4">RaiRaka Catering Dipatiukur Bandung 14045 Jawa Barat Indonesia
                        </p>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by
                <a class="white-text text-lighten-5" href="/">RaiRaka</a>
            </div>
        </div>
    </footer>


		<!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>


		<script>
			$(document).ready(function () {
				$('.sidenav').sidenav();
				$('.parallax').parallax();
				$('.tooltipped').tooltip();
			});
		</script>
</body>

</html>