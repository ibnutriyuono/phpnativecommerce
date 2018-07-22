<?php 
session_start();
include '../../config/conn.php';

if($_GET['id']){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
}
// echo $id;
$sql = "SELECT * FROM posts WHERE id_post = $id";
// echo $data;
$data = $conn->query($sql);
$row = $data->fetch_array(MYSQLI_ASSOC);
// echo $row[0] . " " . $row[1]. " " .$row[2]. " " .$row[5];
echo "<pre>";
var_dump($row);
echo '</pre>';
echo $row['id_post'];
echo $row['title'];
echo $row['price'];


$conn->close();
?>