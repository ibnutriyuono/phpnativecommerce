<?php
if(isset($_GET['id'])){
	error_reporting(0);
	
	include '../../config/conn.php';
	
	$id = addslashes($_GET['id']);
	
	$rawquery = "SELECT id_post FROM posts WHERE id_post='%s'";
	$query = sprintf($rawquery, mysqli_real_escape_string($conn,$id));
	$cek = mysqli_query($conn, $query);
	
	if(mysqli_num_rows($cek) == 0){
		
		echo '<script>window.history.back()</script>';
	
	}else{
		
		$del = mysqli_query($conn,"DELETE FROM posts WHERE id_post='$id'");
		
		if($del){			
			header("location:../../admin/dashboard/index.php?page=homeadmin&pesan=deleted");			
		}else{			
			echo 'Gagal menghapus data! ';		
			echo '<a href="../../admin/dashboard/index.php">Kembali</a>';			
		}	
	}
	
}else{
	
	echo '<script>window.history.back()</script>';
	
}
?>