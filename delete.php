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
$idProduk = $_GET['idProduk'];
$idKeranjang = $_GET['idKeranjang'];

//deleting the row from table
if($result=mysqli_query($mysqli, 
	"DELETE FROM `w3pomade`.`detailkeranjang` WHERE  `idKeranjang`='" . $idKeranjang ."' AND `idProduk`='" . $idProduk ."'")) {
		header('Location:keranjang.php');
}

//redirecting to the display page (view.php in our case)
//header("Location:keranjang.php");
?>
<div style='margin-top:500px;width: 500px;height:300px'>
</div>

