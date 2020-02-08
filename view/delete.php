
<?php
include("../model/config.php");
$id=$_REQUEST['idUser'];
$query = "DELETE FROM user WHERE idUser=$id"; 
$result = mysqli_query($link,$query) or die ( mysqli_error());
header("Location: admin.php"); 
?>