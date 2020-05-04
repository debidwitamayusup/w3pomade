<html>
<head>
	<style type="text/css">
		h1{
			background-color: #012118;
			color: white;
			text-align: center;
		}
		form{
			border: 3px solid #012118;
			width: 400px;
			margin: 80px auto;
			margin-top: 20px;
		}
		input[type=text], input[type=password] {
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
		}
			button {
				background-color: #012118;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 100%;
			}

			
					.imgcontainer {
				text-align: center;
				margin: 24px 0 12px 0;
			}

			img.avatar {
				width: 100%;
				background-color: #012118;	
				margin-top: -25px;
			}

			.container {
				padding: 16px;
			}

			span.psw {
				float: right;
				padding-top: 16px;
			}

			/* Change styles for span and cancel button on extra small screens */
			@media screen and (max-width: 300px) {
				span.psw {
				   display: block;
				   float: none;
				}
				.cancelbtn {
				   width: 100%;
				}
			}
	</style>
</head>
<?php session_start(); ?>
<?php
include("connection.php");
//$idProduk = $_POST['idProduk'];
//$_SESSION['idProduk'] = $id;
$p = isset($_GET['eksen']) ? $_GET['eksen'] : '';
    switch($p) 
    {
     default :
if(isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($username == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['idUser'] = $row['idUser'];
			$_SESSION['username'] = $row['username'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) { 
		if (isset($_SESSION['idProduk'])) {

	
			header('Location: sindex.php');	
		} else {
			 
     header('Location: oilbased.php');
		}
		}
		}
	} else {
?>
	<h1>LOGIN</h1>
	<form name="form1" method="post" action="">
		<div class="imgcontainer">
			<a href="index.php" title="Klik untuk kembali ke home"><img src="img/logo.png"  alt="Avatar" class="avatar"></a>
	</div>
		<div class="container">
		<label><b>Username<b></label>
		<input type="text" placeholder="Enter Username" name="username">
		
		<label><p>Password</b></label>
		<input type="password" placeholder="Enter Password" name="password" required>
		<button type="submit" name="submit" value="submit">Login</button>
	</div>
	<div class="container" style="background-color:#f1f1f1">
		<p>Belum punya akun?</p>
		<a href="register.php"><button type="button" class="cancelbtn">Daftar</button></a>
<!--		<span class="psw">Forget <a href="#">password?</a></span>-->
	</div>
<!--
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><button type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
-->
	</form>
<?php
}
break;
case "adaProduk":
$idProduk = $_GET['idProduk'];
$_SESSION['idProduk'] = $idProduk;
if(isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($username == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['idUser'] = $row['idUser'];
			$_SESSION['username'] = $row['username'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) { 
		if (isset($_SESSION['idProduk'])) {

	 $result = mysqli_query($mysqli, "SELECT * FROM produk WHERE idProduk='".$_GET['idProduk']."'");
                 while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			header('Location: waterbased.php?p=detProduk&idProduk='.$dt[idProduk]);
		}	
		} else {
                $result = mysqli_query($mysqli, "SELECT * FROM produk WHERE idProduk='".$_GET['idProduk']."'");
                 while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			header('Location: index.php?p=detProduk&idProduk='.$dt[idProduk]);
		}	
		}
		}
		}
	} else {
?>
	<h1>LOGIN</h1>
	<form name="form1" method="post" action="">
		<div class="imgcontainer">
			<a href="index.php" title="Klik untuk kembali ke home"><img src="img/logo.png"  alt="Avatar" class="avatar"></a>
	</div>
		<div class="container">
		<label><b>Username<b></label>
		<input type="text" placeholder="Enter Username" name="username">
		
		<label><p>Password</b></label>
		<input type="password" placeholder="Enter Password" name="password" required>

                             <input type="hidden" name="p" value="adaProduk">
		<button type="submit" name="submit" value="submit">Login</button>
	</div>
	<div class="container" style="background-color:#f1f1f1">
		<p>Belum punya akun?</p>
		<a href="register.php"><button type="button" class="cancelbtn">Daftar</button></a>
<!--		<span class="psw">Forget <a href="#">password?</a></span>-->
	</div>
<!--
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><button type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
-->
	</form>
<?php
}break;
}

?>
</html>
