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
		
		/* Jendela Pop Up */
#popup {
	width: 100%;
	height: 100%;
	position: fixed;
	background: rgba(0,0,0,.7);
	top: 0;
	left: 0;
	z-index: 9999;
	visibility: visible;
}

.window {
	width: 400px;
	height: 100px;
	background: #fff;
	border-radius: 10px;
	position: relative;
	padding: 10px;
	text-align: center;
	margin: 15% auto;
}
.window h2 {
	margin: 30px 0 0 0;
}
/* Button Close */
.close-button {
	width: 6%;
	height: 20%;
	line-height: 23px;
	background: #000;
	border-radius: 50%;
	border: 3px solid #fff;
	display: block;
	text-align: center;
	color: #fff;
	text-decoration: none;
	position: absolute;
	top: -10px;
	right: -10px;	
}

/* Memunculkan Jendela Pop Up*/
#popup:target {
	visibility: visible;
}
	</style>
</head>
<body>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$idUser = $_POST['idUser'];
	$nama = $_POST['nama'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$pass = $_POST['password'];

	if($idUser == "" || $nama == "" || $alamat == "" || $email == "" || $username == ""	||	$pass == "") {
		echo "<div id='account-form'>";
		echo "<div class='alert alert-danger'>Semua field harus diisi. Beberapa field ditemukan kosong.</div>";
		echo "<br/>";
		echo "<a href='register.php'>Kembali</a>";
		echo "</div>";
	} else {
		$result2=mysqli_query($mysqli, "INSERT INTO user(idUser, nama, telp, alamat, email, username, password) VALUES ('$idUser', '$nama', '$telp', '$alamat', '$email', '$username', md5('$pass'))")
			or die("Could not execute the insert query.");
		$result3=mysqli_query($mysqli, "INSERT INTO checkout(idUser,a_checkout) VALUES ('$idUser','$alamat')");
//		echo "<div id=\"container\">";
//		echo "Pendaftaran akun berhasil!";
//		echo "<br/>";
//		echo "<a href='login.php'>Login</a>";
//		echo "</div>";
		echo "<div id=\"popup\">";
    	echo "<div class=\"window\">";
        	echo "<a href=\"login.php\" class=\"close-button\" title=\"Close\">X</a>";
            echo "<h2>Selamat Anda Berhasil Daftar</h2>";
        	echo "</div>";
			echo "</div>";
	}
} else {
?>
	<h1>DAFTAR MEMBER</h1>
	<form name="form1" method="post" action="">
		<div class="imgcontainer">
			<a href="index.php" title="Klik untuk kembali ke home"><img src="img/logo.png"  alt="Avatar" class="avatar"></a>
	</div>
		<div class="container">
		<label><b>ID User</b></label>
		<input type="text" placeholder="ID User" name="idUser">
		
		<label><b>Nama<b></label>
		<input type="text" placeholder="Masukkan Nama" name="nama">
		
		<label><b>No. Telepon</b></label>
		<input type="text" placeholder="No. Telp" name="telp">
		
		<label><b>Alamat</b></label>
		<input type="text" placeholder="Alamat" name="alamat">
		
		<label><b>E-mail</b></label>
		<input type="text" placeholder="Email harus diisi" name="email" required>
		
		<label><b>Username</b></label>
		<input type="text" placeholder="Username" name="username">
		
		<label><p>Password</b></label>
		<input type="password" placeholder="Enter Password" name="password" required>
		
		<button type="submit" name="submit" value="Submit">Daftar</button>
		
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
?>
		</body>
</html>
