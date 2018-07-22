    <?php
    
    if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "login"){
			echo "Anda Berhasil Login ! Selamat Datang ".$username;
		}else if($_GET['pesan'] == "logout"){
			echo "Berhasil Logout Terima Kasih Sudah Berbelanja Di RaiRaka Catering";
		}else if($_GET['pesan'] == "confirmed"){
			echo "Pesanan Sudah diterima Pesanan akan segera di proses Terima Kasih telah Berbelanja di RaiRaka !";
		}else if($_GET['pesan'] == "gagal"){
			echo '<script>swal({
                title: "Login Gagal",
                text: "Silahkan cek username dan password anda!",
                icon: "error",
                button: "Kembali",
              });</script>';
		}
	}
    
    ?>

        <div class="container">
            <div class="section">

                <div class="row">
                    <div class="col s12 m6 offset-m3">

                        <div class="card">

                            <div class="card-action teal lighten-2 white-text center-align">
                                <h3>Masuk</h3>
                            </div>
                            <form method="post" action="function/user/login.php">
                                <div class="card-content">
                                    <div class="form-field">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" placeholder="Enter Username" autofocus required name="username" id="username">
                                    </div>
                                    <br>
                                    <div class="form-field">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Username" required name="password" id="password">
                                    </div>
                                    <br>
                                    <div class="form-field">
                                        <label>
                                            <input type="checkbox" />
                                            <span>Remember Me</span>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-field">
                                        <input type="submit" value="Masuk !" class="btn-large waves-effect waves-dark white-text" style="width: 100%;">
                                    </div>
                                    <br>
                                    <a href="index.php?page=register">Belum Memiliki Account? Klik Disini..</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
