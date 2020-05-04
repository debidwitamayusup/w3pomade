<?php session_start(); ?>
<?php

include('headeradmin.php');
if(!isset($_SESSION['valid'])) {
	header('Location: loginadmin.php');
}
?>

<?php

//including the database connection file
include_once("connection.php");
echo "<div style=\"margin-top:150px;text-align:center;background-color:#012118;color:white\">"	;	
	echo "<h1>DAFTAR MEMBER</h1>";
echo "</div>";
	$idKeranjang = 'KERANJANG-' . $_SESSION['idUser'];
	$sessionId = session_id();
	$idProduk = isset($_POST['idProduk']) ? $_POST['idProduk'] : '';
	$jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';
	$idUser = $_SESSION['idUser'];
	$total = 'Rp. ' . 0;

     	echo "<div class='container'>";
		  echo "<table id=\"keranjang\" cellpadding=\"10\" cellspacing=\"1\">
		<tr>
			<th>ID User</th>
			<th>Nama User</th>
			<th>Telp</th>
			<th>Alamat</th>
			<th>Email</th>
			<th>Username</th>
		</tr>";
		         $result = mysqli_query($mysqli, "SELECT * FROM user");
                 while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   
		echo "<tr>
				<td>$dt[idUser]</td>
				<td>$dt[nama]</td>
				<td>$dt[telp]</td>
				<td>$dt[alamat]</td>
				<td>$dt[email]</td>
				<td>$dt[username]</td>
				<td><a href=\"edituser.php?idUser=$dt[idUser]\" onClick=\"return confirm('Anda yakin ingin mengubah?')\">Ubah |</a><a href=\"deleteuser.php?idUser=$dt[idUser]\" onClick=\"return confirm('Anda yakin ingin menghapus?')\">| Hapus</a></td>
			</tr>";
		}
              echo "</table>";
                echo "</div>";
                ?>
</body></html>