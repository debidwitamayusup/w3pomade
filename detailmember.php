<?php

include('headeradmin.php');
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php
//including the database connection file
include_once("connection.php");
echo "<div style=\"margin-top:150px;text-align:center;background-color:#012118;color:white\">"	;	
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
	echo "<h1>DETAIL KERANJANG BELANJA $nama</h1>";
echo "</div>";
	$sessionId = session_id();
	$idProduk = isset($_POST['idProduk']) ? $_POST['idProduk'] : '';
	$idKeranjang = isset($_GET['idKeranjang']) ? $_GET['idKeranjang'] : '';
	$jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';
	$idUser = $_SESSION['idUser'];
	$total = 'Rp. ' . 0;
			
     	echo "<div class='container'>";
     	echo "<h3>No Transaksi : $idKeranjang</h5>";
		  echo "<table id=\"keranjang\" cellpadding=\"10\" cellspacing=\"1\">
		<tr>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Sub Total</th>
		</tr>";
		         $result = mysqli_query($mysqli, "SELECT * FROM keranjang,detailkeranjang,produk WHERE keranjang.idKeranjang ='".$idKeranjang."' and produk.idProduk=detailkeranjang.idProduk and keranjang.idKeranjang=detailkeranjang.idKeranjang");
                 while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   
                 	$jumlah = $dt['jumlah'];
            		
                        $subTotal = $jumlah * $dt['harga'];
						$total = $total + $subTotal;
						$namaProduk = $dt['namaProduk'];
		echo "<tr>
				<td>$namaProduk</td>
				<td>$dt[jumlah]</td>
				<td>$dt[harga]</td>
				<td>$subTotal</td>
			</tr>";
		}
              echo "</table>";
                echo "<h1>Total Biaya Belanja $nama: Rp. $total</h1>";
                echo "</div>";

                
?>
</body>