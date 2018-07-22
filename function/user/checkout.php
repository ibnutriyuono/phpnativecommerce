<?php
session_start();
include '../../config/conn.php';

 if (empty($_SESSION['statususer'])){
    header("location:../../index.php?pesan=gagal");  
 }

//  if(isset($_POST["submit"])){
//    echo "Click On YesBtn";
//     echo '<pre>';
//    print_r($_SESSION['shopping_cart']);
//    echo $_SESSION['username'];
    $value = $_SESSION['shopping_cart'];
    $arrayitem = array();
    $username_user = $_SESSION['username'];

    $data = mysqli_query($conn,
        "SELECT id_user FROM user WHERE username_user = '$username_user'"
    );
    if(mysqli_num_rows($data) == 0 ){
        echo 'error';
    }else{
        
        $row_akun = mysqli_fetch_assoc($data);
        $id = $row_akun['id_user'];
        foreach ($value as $product) {

            $item_id = $product['item_id'];
            $item_price = $product['item_price'];
            $item_quantity = $product['item_quantity'];

        
            mysqli_query($conn, "INSERT INTO `order` (`id_post`, `id_user`, `quantity`) 
              VALUES ('$item_id', '$id', '$item_quantity')");
            header("location:../../index.php?pesan=confirmed");  
			
			$dt=mysqli_query($conn, "select * from posts where id_post='$item_id'");
            $data=mysqli_fetch_array($dt);
            $sisa=$data['stock']-$item_quantity;
            mysqli_query($conn, "update posts set stock='$sisa' where id_post='$item_id'");
			
            unset ($_SESSION['shopping_cart']);
        }
    }  
    

 //   mysqli_query($conn, "INSERT INTO `order` (`id_post`, `id_user`, `quantity`) VALUES ('$idproduk', '$id', '$quantity')");
//    if(mysqli_num_rows($check) == 0 ){
 //      echo 'error';
 //   }else{
  //      echo 'berhasil';
  //  }

//  } 


?>