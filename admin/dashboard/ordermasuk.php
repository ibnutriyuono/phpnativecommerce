

    <?php
	include '../../config/conn.php';

    $page = 7;
    
    $q = mysqli_query($conn, "SELECT name_user,email_user,title,
                             quantity,date_order,price,image FROM `order` JOIN
                             `posts` ON `order`.`id_post`=`posts`.`id_post`
                             JOIN `user` ON `order`.`id_user`=`user`.`id_user`
                             ORDER BY date_order DESC "
                     );

    $jum=mysqli_num_rows($q);
    $pages = ceil($jum/$page);

    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($page * $halamanAktif)-$page;
    // var_dump($pages);
    $result = mysqli_query($conn, "SELECT name_user,email_user,title,
                            quantity,date_order,price,image FROM `order` JOIN
                            `posts` ON `order`.`id_post`=`posts`.`id_post`
                            JOIN `user` ON `order`.`id_user`=`user`.`id_user`
                            ORDER BY date_order DESC LIMIT $awalData, $page "
                           );                        
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}

	?>
        <div class="container">
            <div class="section">
                <div class="row">

                    <table class="" width='100%' border=1>
                        <thead>
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Email Pelanggan</th>
                                <th>Nama Pesanan</th>
                                <th>Jumlah</th>
                                <th>Tanggal Order</th>
                                <th>Harga</th>
                                <th>Gambar Produk</th>
                            </tr>
                        </thead>
                        <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$user_data['name_user']."</td>";
        echo "<td>".$user_data['email_user']."</td>";
        echo "<td>".$user_data['title']."</td>";    
        echo "<td>".$user_data['quantity']."</td>";
        echo "<td>".$user_data['date_order']."</td>";
        echo "<td>Rp. ".$user_data['price'].",-</td>";
        echo '<td><img src="../../assets/images/post/'.$user_data['image'].'" 
        width=100></td>';
        echo "</tbody>";
    }
    ?>
                    </table>
                    <?php for ($i=1; $i <=$pages ; $i++) :?>
                    <a href="index.php?page=ordermasuk&halaman=<?= $i; ?>">
                        <?= $i;?>
                    </a>
                    <?php endfor;?>
                </div>
            </div>
        </div>