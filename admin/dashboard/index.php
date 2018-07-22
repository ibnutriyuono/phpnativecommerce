<?php
    include("headeradmin.php");
    if(isset($_GET['page'])){
        $page=$_GET['page'].".php";
    } else {
        $page="homeadmin.php";
    }
    include($page);
    include("footeradmin.php");
?>