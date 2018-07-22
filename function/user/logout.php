<?php

// mengaktifkan session
session_start();
 
// menghapus semua session
// $_SESSION = array();
session_destroy();
// $_SESSION['username'] = [];
 
// mengalihkan halaman sambil mengirim pesan logout
header("location:../../index.php?pesan=logout");

?>