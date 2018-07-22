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

    <div class="container">
        <div class="section">
            <div class="row">
                <h2 class="center-align">TAMBAH MENU</h2>
                <form method="post" action="../../function/admin/create.php" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Nama Produk</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="title" placeholder="Masukkan title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="price" placeholder="Masukkan price" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Barang</td>
                            <td>:</td>
                            <td>
                                <input type="number" name="stock" placeholder="Masukkan stock" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Gambar</td>
                            <td>:</td>
                            <td>
                                <input type="file" name="image" placeholder="Masukkan image" required>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input class="waves-effect waves-light btn" type="submit" value="CREATE">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

  