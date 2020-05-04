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
	$idUser = $_POST['idUser'];
	
	$a_checkout = $_POST['a_checkout'];
	
	// checking empty fields
	if(empty($a_checkout)){
				
		if(empty($a_checkout)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE checkout SET a_checkout='$a_checkout' WHERE idUser='$idUser'");
		
		echo  "UPDATE checkout SET a_chekout='$a_checkout' WHERE idUser='$idUser'";
		//redirectig to the display page. In our case, it is view.php
		header("Location: checkout.php");
	}
}
?>
<?php
//getting id from url
$idUser = $_GET['idUser'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE idUser='$idUser'");
if($res = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$a_checkout = $res['alamat'];
}
?>
<div id="content">
	<a class="btn btn-primary" href="homeadmin.php">Home</a> / <a class="btn btn-primary" href="checkout.php">Lihat Tabel User</a>
	<br/><br/>
	
	<form name="form1" method="post" action="a_checkout.php">
		<table border="0">
			<tr> 
				<td>Alamat Tujuan Baru</td>
				<td><input class="form-control" type="text" name="a_checkout" value="<?php echo $a_checkout;?>"></td>
			</tr>
			<tr>
				<td><input class="form-control" type="hidden" name="idUser" value=<?php echo $_GET['idUser'];?>></td>
				<td><input class="btn btn-primary" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>
