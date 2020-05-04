<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['tambah']))
{	
	$idProduk = $_POST['idProduk'];
	$namaProduk = $_POST['namaProduk'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$gambarProduk = $_POST['gambarProduk'];
	$kategori = $_POST['kategori'];
	$deskripsi1 = $_POST['deskripsi1'];
	$deskripsi2 = $_POST['deskripsi2'];
	$deskripsi3 = $_POST['deskripsi3'];
	$deskripsi4 = $_POST['deskripsi4'];
	$deskripsi5 = $_POST['deskripsi5'];
	$deskripsi6 = $_POST['deskripsi6'];
	$status = $_POST['status'];
	
	// checking empty fields
	if(empty($idProduk) || empty($namaProduk) || empty($harga) || empty($stok) || empty($gambarProduk) || empty($kategori)){
				
		if(empty($idProduk)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($namaProduk)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($stok)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($harga)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		if(empty($gambarProduk)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if(empty($kategori)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "INSERT into produk (idProduk,namaProduk, harga, stok,gambarProduk,kategori, deskripsi1, deskripsi2,deskripsi3,deskripsi4,deskripsi5,deskripsi6,status) VALUES ('$idProduk', '$namaProduk', '$harga', '$stok', '$gambarProduk', '$kategori','$deskripsi1', '$deskripsi2','$deskripsi3','$deskripsi4','$deskripsi5','$deskripsi6', '$status')");
		
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: produkadmin.php");
	}
}
?>

<div id="content">
	<a class="btn btn-primary" href="homeadmin.php">Home</a> / <a class="btn btn-primary" href="produkadmin.php">View Products</a>
	<br/><br/>
	
	<form name="form1" method="post" action="tambahproduk.php">
		<table border="0">
			<tr> 
				<td>ID Produk</td>
				<td><input class="form-control" type="text" name="idProduk"></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input class="form-control" type="text" name="namaProduk"></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input class="form-control" type="text" name="harga"></td>
			</tr>
			<tr> 
				<td>Stok</td>
				<td><input class="form-control" type="number" name="stok"></td>
			</tr>
			<tr> 
				<td>Gambar</td>
				<td><input class="form-control" type="text" name="gambarProduk"></td>
			</tr>
			<tr> 
				<td>Kategori</td>
				<td><input class="form-control" type="text" name="kategori"></td>
			</tr>
			<tr> 
				<td>Deskripsi 1</td>
				<td><input class="form-control" type="text" name="deskripsi1"></td>
			</tr>
			<tr> 
				<td>Deskripsi 2</td>
				<td><input class="form-control" type="text" name="deskripsi2"></td>
			</tr>
			<tr> 
				<td>Deskripsi 3</td>
				<td><input class="form-control" type="text" name="deskripsi3"></td>
			</tr>
			<tr> 
				<td>Deskripsi 4</td>
				<td><input class="form-control" type="text" name="deskripsi4"></td>
			</tr>
			<tr> 
				<td>Deskripsi 5</td>
				<td><input class="form-control" type="text" name="deskripsi5"></td>
			</tr>
			<tr> 
				<td>Deskripsi 6</td>
				<td><input class="form-control" type="text" name="deskripsi6" ></td>
			</tr>
			<tr> 
				<td>status</td>
				<td><input class="form-control" type="text" name="status"></td>
			</tr>
			<tr>
				<td><input class="btn btn-primary" type="submit" name="tambah" value="Tambah"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>
