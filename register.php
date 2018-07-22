    <?php
    
    if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "login"){
			echo "Anda Berhasil Login ! Selamat Datang ";
		}else if($_GET['pesan'] == "logout"){
			echo "Berhasil Logout Terima Kasih Sudah Berbelanja Di RaiRaka Catering";
		}else if($_GET['pesan'] == "gagalpass"){
			echo '<script>swal({
                title: "Password Berbeda",
                text: "Silahkan cek password anda pastikan sama dengan retype password!",
                icon: "error",
                button: "Kembali",
              });</script>';
        }else if($_GET['pesan'] == "gagalusername"){
			echo '<script>swal({
                title: "Username Terdaftar",
                text: "Username sudah terdaftar silahkan ganti username anda!",
                icon: "error",
                button: "Kembali",
              });</script>';
		}else if($_GET['pesan'] == "gagalemail"){
			echo '<script>swal({
                title: "Email Terdaftar",
                text: "Email sudah terdaftar silahkan ganti username anda!",
                icon: "error",
                button: "Kembali",
              });</script>';
		}else if($_GET['pesan'] == "gagal"){
			echo '<script>swal({
                title: "Login Gagal",
                text: "Silahkan cek username dan password anda!",
                icon: "error",
                button: "Kembali",
              });</script>';
		}else if($_GET['pesan'] == "gagalname"){
            echo '<script>swal({
                title: "Nama Salah",
                text: "Nama harus berupa huruf, silahkan cek kembali!",
                icon: "error",
                button: "Kembali",
              });</script>';
        }else if($_GET['pesan'] == "gagalpass2"){
            echo '<script>swal({
                title: "Password Salah",
                text: "Password minimal 8 karakter, hanya huruf dan angka!",
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
                                <h3>Daftar</h3>
                            </div>
                            <form method="post" action="function/user/register.php">
                                <div class="card-content">
                                    <div class="form-field">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" placeholder="Enter Username" required name="username" id="username">
                                    </div>
                                    <br>
                                    <div class="form-field">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" required name="password" id="password">
                                    </div>
                                    <br>
                                    <div class="form-field">
                                        <label for="password2">Re-type Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" required name="password2" id="password2">
                                    </div>
                                    <br>
                                    <div class="form-field">
                                        <label for="username">Nama</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Name" required name="name" id="username">
                                    </div>
                                    <br>
                                    <div class="form-field">
                                        <label for="username">Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Your Email" required name="email" id="email">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-field">
                                        <input type="submit" value="Kirim !" class="btn-large waves-effect waves-dark white-text" style="width: 100%;">
                                    </div>
                                    <br>
                                    <a href="index.php?page=login">Kembali ke Laman Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
