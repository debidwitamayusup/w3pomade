<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: loginadmin.php');
}
?>

<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$idProduk = $_GET['idProduk'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM produk WHERE idProduk='".$idProduk."'");
//redirecting to the display page (view.php in our case)
header("Location:produkadmin.php");
?>

