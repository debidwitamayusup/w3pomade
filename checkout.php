<?php

include('header.php');
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php
//including the database connection file
include_once("connection.php");
echo "<div style=\"margin-top:150px;text-align:center;background-color:#012118;color:white\">"	;	
	echo "<h1>CHECK OUT</h1>";
echo "</div>";
	$idKeranjang = 'K-' . $_SESSION['idUser'];
	$sessionId = session_id();
	$idProduk = isset($_POST['idProduk']) ? $_POST['idProduk'] : '';
	$jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';
	$idUser = $_SESSION['idUser'];
	// $total = 'Rp. ' . 0;
	$total = 0;
     	echo "<div class='container'>";
		echo "<h3>No Transaksi : $idKeranjang</h5>";
		  echo "<table id=\"keranjang\" cellpadding=\"10\" cellspacing=\"1\">
		<tr>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Sub Total</th>
		</tr>";
		         $result = mysqli_query($mysqli, "SELECT * FROM keranjang,detailkeranjang,produk WHERE idUser ='".$idUser."' and produk.idProduk=detailkeranjang.idProduk and keranjang.idKeranjang=detailkeranjang.idKeranjang");
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
                echo "</div>";
			
			
     	echo "<nav class='container'>";
		  echo "<table cellpadding=\"10\" cellspacing=\"1\">
		<tr>
			<th>Data Diri<th>
		</tr>";

		$result5 = mysqli_query($mysqli, "SELECT user.nama,user.telp,checkout.a_checkout,user.email from user,checkout WHERE checkout.idUser='$idUser' and user.idUser=checkout.idUser");
		if( mysqli_num_rows($result5) > 0 ){
                 while($ds = mysqli_fetch_array($result5, MYSQLI_ASSOC)) {  
		echo "<tr>
				<td>Nama<td>
				: $ds[nama]
			</tr>"; 
		echo "<tr>
				<td>No. Telp</td>
				<td>: $ds[telp]</td>
			</tr>";
		echo "<tr>
				<td>E-Mail</td>
				<td>: $ds[email]</td>
			</tr>";
		echo "<tr>
				<td>Alamat Tujuan<td>
				: $ds[a_checkout] 
			<td><a href=\"a_checkout.php?idUser=$idUser\" onClick=\"return confirm('Anda yakin ingin mengubah?')\">Ubah alamat?</a></td>
			</tr>";
		echo "<tr>
				<td>Total Biaya<td>
				: Rp. $total,-
			</tr>";
				 }
              echo "</table>";
			echo "</nav>";
		}else{
			
		if($result5 = mysqli_query($mysqli, "SELECT * from user where idUser='$idUser'" )){
                 while($ds = mysqli_fetch_array($result5, MYSQLI_ASSOC)) {  
		echo "<tr>
				<td>Nama<td>
				: $ds[nama]
			</tr>"; 
		echo "<tr>
				<td>No. Telp</td>
				<td>: $ds[telp]</td>
			</tr>";
		echo "<tr>
				<td>E-Mail</td>
				<td>: $ds[email]</td>
			</tr>";
		echo "<tr>
				<td>Alamat Tujuan<td>
				: $ds[alamat] 
			<td><a href=\"a_checkout.php?idUser=$idUser\" onClick=\"return confirm('Anda yakin ingin mengubah?')\">Ubah alamat?</a></td>
			</tr>";
		echo "<tr>
				<td>Total Biaya<td>
				: Rp. $total,-
			</tr>";
				 }
              echo "</table>";
			echo "</nav>";
		}
		}
include('footeradmin.php');
?>
</body>