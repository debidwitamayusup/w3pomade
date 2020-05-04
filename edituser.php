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
	
	$nama = $_POST['nama'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// checking empty fields
	if(empty($nama) || empty($telp) || empty($alamat) || empty($email) || empty($username)){
				
		if(empty($nama)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($telp)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($alamat)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		if(empty($email)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if(empty($username)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE user SET nama='$nama', telp='$telp', alamat='$alamat', email='$email', username = '$username' WHERE idUser='$idUser'");
		
		echo "UPDATE user SET nama='$nama', telp='$telp', alamat='$alamat', email='$email', username = '$username' WHERE idUser='$idUser'";
		//redirectig to the display page. In our case, it is view.php
		header("Location: user.php");
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
	$name = $res['nama'];
	$telp = $res['telp'];
	$alamat = $res['alamat'];
	$email = $res['email'];
	$username = $res['username'];
	$password = $res['password'];
}
?>
<div id="content">
	<a class="btn btn-primary" href="homeadmin.php">Home</a> / <a class="btn btn-primary" href="user.php">Lihat Tabel User</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edituser.php">
		<table border="0">
			<tr> 
				<td>Nama</td>
				<td><input class="form-control" type="text" name="nama" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Telp</td>
				<td><input class="form-control" type="text" name="telp" value="<?php echo $telp;?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input class="form-control" type="textr" name="alamat" value="<?php echo $alamat;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input class="form-control" type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Username</td>
				<td><input class="form-control" type="text" name="username" value="<?php echo $username;?>"></td>
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
