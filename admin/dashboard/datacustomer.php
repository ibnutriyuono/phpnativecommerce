
    <?php
	include '../../config/conn.php';
	
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
    }
    	
    $page = 4;
    
    $q = mysqli_query($conn, "SELECT * FROM user");
    $jum=mysqli_num_rows($q);
    $pages = ceil($jum/$page);

    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($page * $halamanAktif)-$page;
    $result = mysqli_query($conn, "SELECT * from user LIMIT $awalData, $page");
    
    // var_dump($halamanAktif);
	?>
        <div class="container">
            <div class="section">
                <div class="row">
                    <h1 class="center-align">Data Pelanggan</h1>
                    <table class="" width='100%' border=1>
                        <thead>
                            <tr>
                                <th>Id User</th>
                                <th>Email Pelanggan</th>
                                <th>Username</th>
                                <th>Nama Pelanggan</th>
                            </tr>
                        </thead>
                        <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$user_data['id_user']."</td>";
        echo "<td>".$user_data['email_user']."</td>";
        echo "<td>".$user_data['username_user']."</td>";
        echo "<td>".$user_data['name_user']."</td>";    
        echo "</tbody>";
    }
    ?>
                    </table>
                    <?php for ($i=1; $i <=$pages ; $i++) :?>
                    <a class="pagination" href="index.php?page=datacustomer&halaman=<?= $i; ?>">
                        <?= $i;?>
                    </a>
                    <?php endfor;?>
                </div>
            </div>
        </div>