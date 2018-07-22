    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <h1 class="header center white-text text-lighten-2">RaiRaka Catering</h1>
                <div class="row center">
                    <h5 class="header col s12 white-text light">Pesan Sekarang Juga</h5>
                </div>
            </div>
        </div>
        <div class="parallax">
            <img src="background.jpg"
                alt="background">
            <?php

	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "login"){
			echo '<script>swal({
                title: "Login Berhasil",
                text: "Selamat Datang",
                icon: "success",
                button: "Kembali",
              });</script>';
		}else if($_GET['pesan'] == "logout"){
			echo '<script>swal({
                title: "Logout Berhasil",
                text: "Terima Kasih dan Sampai Berjumpa Kembali",
                icon: "success",
                button: "Kembali",
              });</script>';
		}else if($_GET['pesan'] == "confirmed"){
			echo '<script>swal({
                title: "Pesanan di terima",
                text: "Pesanan Sudah di terima, Terima Kasih telah berbelanja di RaiRaka",
                icon: "success",
                button: "Kembali",
              });</script>';
		}else if($_GET['pesan'] == "gagal"){
			echo '<script>swal({
                title: "Silahkan login terlebih dahulu",
                text: "Silahkan login untuk lanjut berbelanja!",
                icon: "error",
                button: "Kembali",
              });</script>';
		}else if($_GET['pesan'] == "registered"){
			echo '<script>swal({
                title: "Selamat",
                text: "Selamat Datang di RaiRaka silahkan berbelanja !",
                icon: "success",
                button: "Kembali",
              });</script>';
		}
	}

?>

        </div>
    </div>

    <div class="container" id="sectionBanner">
        <div class="section">
            <h2></h2>
            <!--   Icon Section   -->
            <div class="row">

                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="https://images.unsplash.com/photo-1506027497629-626def8ddb41?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=17140db7130108e8bc86f76d208ba134&auto=format&fit=crop&w=750&q=80">
                            <span class="card-title ">Pesan Sekarang Juga</span>
                        </div>
                        <div class="card-content">
                            <p>Makanan berbagai jenis dengan harga yang dijamin murah.</p>
                        </div>
                        <div class="card-action">
                            <a href="index.php?page=produk">Klik Disini</a>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="https://images.unsplash.com/45/eDLHCtzRR0yfFtU0BQar_sylwiabartyzel_themap.jpg?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2110dad38a593cd7986276d92748d27b&auto=format&fit=crop&w=1057&q=80">
                            <span class="card-title  ">Langsung ke Tempat Kami</span>
                        </div>
                        <div class="card-content">
                            <p>Ingin langsung ke toko Kami? Klik link dibawah ini.</p>
                        </div>
                        <div class="card-action">
                            <a href="https://www.google.co.id/maps/place/SPBU+Pertamina+34-40125/@-6.8907888,107.6147719,17z/data=!4m13!1m7!3m6!1s0x2e68e654003602b9:0x81becb9963e60392!2sJl.+Dipati+Ukur,+Lebakgede,+Coblong,+Kota+Bandung,+Jawa+Barat!3b1!8m2!3d-6.8907888!4d107.6169606!3m4!1s0x2e68e6541653f973:0x8000a58430cd50e3!8m2!3d-6.8907981!4d107.616602"
                                target="_blank">Klik Disini</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
