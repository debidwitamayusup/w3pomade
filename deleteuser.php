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
$idUser = $_GET['idUser'];
$idKeranjang = 'K-' . $_GET['idUser'];
//deleting the row from table

$result11=mysqli_query($mysqli, "DELETE FROM checkout WHERE idUser='".$idUser."'");
$result9=mysqli_query($mysqli, "DELETE FROM detailkeranjang WHERE idKeranjang ='".$idKeranjang."'");
$result10=mysqli_query($mysqli, "DELETE FROM keranjang WHERE idUser='".$idUser."'");
$result=mysqli_query($mysqli, "DELETE FROM user WHERE idUser='".$idUser."'");
//redirecting to the display page (view.php in our case)
header("Location:user.php");
?>

