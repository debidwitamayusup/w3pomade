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
$idKeranjang = $_GET['idKeranjang'];
//deleting the row from table

$result9=mysqli_query($mysqli, "DELETE FROM detailkeranjang WHERE idKeranjang ='".$idKeranjang."'");
$result10=mysqli_query($mysqli, "DELETE FROM keranjang WHERE idKeranjang='".$idKeranjang."'");
//redirecting to the display page (view.php in our case)
header("Location:statusmember.php");
?>

