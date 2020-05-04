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
	echo "<h1>PRODUK</h1>";
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
			<th>ID Produk</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Gambar Produk</th>
			<th>Kategori</th>
			<th>Aksi</td>
		</tr>";
		         $result = mysqli_query($mysqli, "SELECT * FROM produk");
                 while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
                 
                print_r($dt);  
		echo "<tr>
				<td>$dt[idProduk]</td>
				<td>$dt[namaProduk]</td>
				<td>$dt[harga]</td>
				<td>$dt[stok]</td>
				<td>$dt[gambarProduk]</td>
				<td>$dt[kategori]</td>
				<td><a href=\"editproduk.php?idProduk=$dt[idProduk]\" onClick=\"return confirm('Anda yakin ingin mengubah?')\">Ubah |</a><a href=\"deleteproduk.php?idProduk=$dt[idProduk]\" onClick=\"return confirm('Anda yakin ingin menghapus?')\">| Hapus</a></td>
			</tr>";
		}
              echo "</table>";

			echo "<a href='tambahproduk.php'><button>Tambah Produk</button></a>";
                echo "</div>";
                ?>
</body></html>