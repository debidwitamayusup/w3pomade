<?php 

include('header.php');
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//getting id of the data from url
$id = $_GET['idProduk'];
//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM detailKeranjang WHERE idProduk=$id");

//redirecting to the display page (view.php in our case)
header("Location:keranjang.php");
?>

