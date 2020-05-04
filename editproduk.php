<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
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
	if(empty($namaProduk) || empty($harga) || empty($stok) || empty($gambarProduk) || empty($kategori)){
				
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
		$result = mysqli_query($mysqli, "UPDATE produk SET namaProduk='$namaProduk', harga='$harga', stok=$stok, gambarProduk='$gambarProduk', kategori='$kategori', deskripsi1='$deskripsi1', deskripsi2='$deskripsi2',deskripsi3='$deskripsi3',deskripsi4='$deskripsi4',deskripsi5='$deskripsi5',deskripsi6='$deskripsi6', status='$status' WHERE idProduk='$idProduk'");
		
		echo "UPDATE produk SET namaProduk='$namaProduk', harga='$harga', stok=$stok, gambarProduk='$gambarProduk', kategori='$kategori', deskripsi1='', deskripsi2='',deskripsi3='',deskripsi4='',deskripsi5='',deskripsi6='', status='$status' WHERE idProduk='$idProduk'";
		//redirectig to the display page. In our case, it is view.php
		header("Location: produkadmin.php");
	}
}
?>
<?php
//getting id from url
$idProduk = $_GET['idProduk'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE idProduk='$idProduk'");
if($res = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$name = $res['namaProduk'];
	$harga = $res['harga'];
	$stok = $res['stok'];
	$gambarProduk = $res['gambarProduk'];
	$kategori = $res['kategori'];
	$deskripsi1 = $res['deskripsi1'];
	$deskripsi2 = $res['deskripsi2'];
	$deskripsi3 = $res['deskripsi3'];
	$deskripsi4 = $res['deskripsi4'];
	$deskripsi5 = $res['deskripsi5'];
	$deskripsi6 = $res['deskripsi6'];
	$status = $res['status'];
}
?>
<div id="content">
	<a class="btn btn-primary" href="homeadmin.php">Home</a> / <a class="btn btn-primary" href="produkadmin.php">View Products</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editproduk.php">
		<table border="0">
			<tr> 
				<td>Nama</td>
				<td><input class="form-control" type="text" name="namaProduk" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input class="form-control" type="text" name="harga" value="<?php echo $harga;?>"></td>
			</tr>
			<tr> 
				<td>Stok</td>
				<td><input class="form-control" type="number" name="stok" value="<?php echo $stok;?>"></td>
			</tr>
			<tr> 
				<td>Gambar</td>
				<td><input class="form-control" type="text" name="gambarProduk" value="<?php echo $gambarProduk;?>"></td>
			</tr>
			<tr> 
				<td>Kategori</td>
				<td><input class="form-control" type="text" name="kategori" value="<?php echo $kategori;?>"></td>
			</tr>
			<tr> 
				<td>Deskripsi 1</td>
				<td><input class="form-control" type="text" name="deskripsi1" value="<?php echo $deskripsi1;?>"></td>
			</tr>
			<tr> 
				<td>Deskripsi 2</td>
				<td><input class="form-control" type="text" name="deskripsi2" value="<?php echo $deskripsi2;?>"></td>
			</tr>
			<tr> 
				<td>Deskripsi 3</td>
				<td><input class="form-control" type="text" name="deskripsi3" value="<?php echo $deskripsi3;?>"></td>
			</tr>
			<tr> 
				<td>Deskripsi 4</td>
				<td><input class="form-control" type="text" name="deskripsi4" value="<?php echo $deskripsi4;?>"></td>
			</tr>
			<tr> 
				<td>Deskripsi 5</td>
				<td><input class="form-control" type="text" name="deskripsi5" value="<?php echo $deskripsi5;?>"></td>
			</tr>
			<tr> 
				<td>Deskripsi 6</td>
				<td><input class="form-control" type="text" name="deskripsi6" value="<?php echo $deskripsi6;?>"></td>
			</tr>
			<tr> 
				<td>status</td>
				<td><input class="form-control" type="text" name="status" value="<?php echo $status;?>"></td>
			</tr>
			<tr>
				<td><input class="form-control" type="hidden" name="idProduk" value=<?php echo $_GET['idProduk'];?>></td>
				<td><input class="btn btn-primary" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>
