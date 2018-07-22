	<?php
	include '../../config/conn.php';

	$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY id_post DESC");
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "created"){
				echo '<script>swal({
					title: "Berhasil Tambah Menu",
					text: "Menu sudah di tambahkan",
					icon: "success",
					button: "Kembali",
				  });</script>';
			}else if($_GET['pesan'] == "updated"){
				echo '<script>swal({
					title: "Berhasil Edit Menu",
					text: "Menu sudah di edit",
					icon: "success",
					button: "Kembali",
				  });</script>';
			}else if($_GET['pesan'] == "gagalupdated"){
				echo '<script>swal({
					title: "Gagal Edit Menu",
					text: "Menu gagal di edit",
					icon: "error",
					button: "Kembali",
				  });</script>';
			}else if($_GET['pesan'] == "deleted"){
				echo '<script>swal({
					title: "Berhasil Hapus Menu",
					text: "Menu sudah berhasil terhapus",
					icon: "success",
					button: "Kembali",
				  });</script>';
			}
		}

	?>

		<div class="container">
			<div class="section">
				<div class="row">
					<form action="../../admin/dashboard/index.php" method="get">
						<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplate="off" id="keyword">
						<input class="btn" type="submit" name="cari" id="tombol-cari" value="Cari">
					</form>
					<br>

					<table>
						<thead>
							<tr>
								<th>No.</th>
								<th>ID Produk</th>
								<th>Nama Produk</th>
								<th>Harga</th>
								<th>Gambar</th>
								<th>Stok</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php
			error_reporting(0);

			include '../../config/conn.php';
			
			if(isset($_GET['cari'])){
				$cari = $_GET['keyword'];
				$query = mysqli_query($conn, 
				"SELECT * FROM posts WHERE title LIKE '%$cari%' 
				OR price LIKE '%$cari%' 
				OR id_post LIKE '%$cari%' 
				OR stock LIKE '%$cari%'");				
			}else{
				$query = mysqli_query($conn, "SELECT * FROM posts");
			}
			
			if(mysqli_num_rows($query) == 0){	
				echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			}else{	
				$no = 1;	
				while($data = mysqli_fetch_assoc($query)){	
					echo '<tr>';
						echo '<td>'.$no.'</td>';	
						echo '<td>'.$data['id_post'].'</td>';	
						echo '<td>'.$data['title'].'</td>';	
						echo '<td>Rp. '.$data['price'].',-</td>';
						echo '<td><img src="../../assets/images/post/'.$data['image'].'" 
						width=50></td>';
						echo '<td>'.$data['stock'].'</td>';
						echo '<td>
						<a href="../../admin/dashboard/edit.php?id='.$data['id_post'].'">Edit</a> / 
						<a href="../../function/admin/delete.php?id='.$data['id_post'].'" 
						onclick="return confirm(\'Yakin?\')">Hapus</a></td>';
					echo '</tr>';
					$no++;				
				}
			}
		?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		