<?php

if(isset($_POST['simpan'])){
	
	include '../../config/conn.php';
	require '../../function/user/validasi.php';
	
	$id     	= mysqli_real_escape_string($conn, $_POST['id']);
	$title		= mysqli_real_escape_string($conn, $_POST['title']);	
	$price		= mysqli_real_escape_string($conn, $_POST['price']);	
	$stock		= mysqli_real_escape_string($conn, $_POST['stock']);	
	$image		= $_FILES['image']['name'];

	if(number($price)){
    	header("location:../../admin/dashboard/edit.php?id=$id&pesan=hargasalah");
	}elseif($stock < 0){
    	header("location:../../admin/dashboard/edit.php?id=$id&pesan=stocksalah");
	}elseif(empty($image)){
		$update = mysqli_query($conn,"UPDATE posts SET title='$title',price='$price', 
		stock='$stock' WHERE id_post='$id'");
	}else{
		$update = mysqli_query($conn,"UPDATE posts SET title='$title',price='$price', 
		stock='$stock', image='$image' WHERE id_post='$id'");
	}	
	move_uploaded_file($_FILES['image']['tmp_name'],'../../assets/images/post/'.$image);
	
	if($update){
		header("location:../../admin/dashboard/index.php?page=homeadmin&pesan=updated");		
	}else{
		header("location:../../admin/dashboard/index.php?page=homeadmin&pesan=gagalupdated");	
	}

}else{	

	echo '<script>window.history.back()</script>';

}
?>