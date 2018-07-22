<?php

include "../../config/conn.php";

$jumlah=mysqli_query($conn, "SELECT username_user FROM USER");
$row = mysqli_fetch_assoc($jumlah);
$username = $row['username_user'];

while($data = mysqli_fetch_assoc($jumlah)){	

    echo $data['username_user']."<br>";

}

?>