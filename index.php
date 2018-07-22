<?php
    include("header.php");
    if(isset($_GET['page'])){
        $page=$_GET['page'].".php";
    } else {
        $page="home.php";
    }
    include($page);
    include("footer.php");
?>