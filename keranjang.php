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
	echo "<h1>KERANJANG BELANJA</h1>";
echo "</div>";
	$idKeranjang = 'K-' . $_SESSION['idUser'];
	$sessionId = session_id();
	$idProduk = isset($_POST['idProduk']) ? $_POST['idProduk'] : '';
	$jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';
	$idUser = $_SESSION['idUser'];
	// $total = 'Rp. ' . 0;
	$total = 0;
	$p = isset($_GET['aksi']) ? $_GET['aksi'] : '';
	echo $p;
    switch($p) 
    {
     default:
			
     	echo "<div class='container'>";
     	echo "<h3>No Transaksi : $idKeranjang</h5>";
		  echo "<table id=\"keranjang\" cellpadding=\"10\" cellspacing=\"1\">
		<tr>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Sub Total</th>
			<th>Aksi</th>
		</tr>";
		         $result = mysqli_query($mysqli, "SELECT * FROM keranjang,detailkeranjang,produk WHERE idUser ='".$idUser."' and produk.idProduk=detailkeranjang.idProduk and keranjang.idKeranjang=detailkeranjang.idKeranjang");
                 while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   
                 	$jumlah = $dt['jumlah'];
						// echo "jumlah".$jumlah;
						// echo $dt["harga"];
						$subTotal = $jumlah * $dt['harga'];
						// echo $subTotal;
						$total = $total + $subTotal;
						$namaProduk = $dt['namaProduk'];
		echo "<tr>
				<td>$namaProduk</td>
				<td>$dt[jumlah]</td>
				<td>$dt[harga]</td>
				<td>$subTotal</td>
				<td><a href=\"delete.php?idProduk=$dt[idProduk]&idKeranjang=$idKeranjang&jumlah=$dt[jumlah]\" onClick=\"return confirm('Anda yakin ingin menghapus?')\">Hapus</a></td>
			</tr>";
		}
              echo "</table>";
                echo "<h1>Total Biaya Belanja Anda: Rp. $total</h1>";
                echo "</div>";
                break;
     case "tambah" :
		//insert data to database	
			
     if($result = mysqli_query($mysqli, "SELECT * FROM keranjang WHERE idUser ='".$idUser."'")) {
     	if(mysqli_num_rows($result)>0) {
     		echo "SELECT * FROM keranjang,detailkeranjang,produk WHERE idUser ='".$idUser."' and detailkeranjang.idProduk = '" . $idProduk . "' and produk.idProduk=detailkeranjang.idProduk;"; 
     		// if($resultProduk = mysqli_query($mysqli, "SELECT * FROM keranjang,detailkeranjang,produk WHERE idUser ='".$idUser."' and detailkeranjang.idProduk = '" . $idProduk . "' and produk.idProduk=detailkeranjang.idProduk;")) {
				if($resultProduk = mysqli_query($mysqli, "SELECT * FROM keranjang a
				left join detailkeranjang b ON a.idKeranjang=b.idKeranjang
				 WHERE idUser ='" . $idUser . "' and b.idProduk = '" . $idProduk . "'")) {
				//  echo mysqli_num_rows($resultProduk);
				//  exit;
     			if(mysqli_num_rows($resultProduk)>0) {
     				$result9 = mysqli_query($mysqli, "UPDATE detailkeranjang SET jumlah=jumlah+" . $jumlah . " WHERE idKeranjang='" . $idKeranjang . "' AND idProduk='". $idProduk ."'");
     				$result10 = mysqli_query($mysqli, "UPDATE produk SET stok=stok-" . $jumlah . " WHERE idProduk='". $idProduk . "'");
     				
     					header('Location:keranjang.php');
     				}
 else {
	 				echo "INSERT INTO detailkeranjang(idKeranjang, idProduk, jumlah) VALUES ('$idKeranjang','$idProduk', $jumlah)";
     				$result2 = mysqli_query($mysqli, "INSERT INTO detailkeranjang(idKeranjang, idProduk, jumlah) VALUES ('$idKeranjang','$idProduk', $jumlah)");
     				$result5 = mysqli_query($mysqli, "UPDATE produk SET stok=stok-$jumlah WHERE idProduk='$idProduk'");
     				header('Location:keranjang.php');
     			}
     		
     	} 
     	}else {
			 $resultSatu = mysqli_query($mysqli, "INSERT INTO keranjang(idKeranjang, idUser, idSession) VALUES ('$idKeranjang', '$idUser', '$sessionId')");
			 echo $idKeranjang."-".$idUser."-".$sessionId;
     		$result2 = mysqli_query($mysqli, "INSERT INTO detailkeranjang(idKeranjang, idProduk, jumlah) VALUES ('$idKeranjang','$idProduk', $jumlah)");
     		$result6 = mysqli_query($mysqli, "UPDATE produk SET stok=stok-$jumlah WHERE idProduk='$idProduk'");

     		echo "<div class='container'>";
     		echo "<h3>No Transaksi : $idKeranjang</h5>";
		  echo "<table id=\"keranjang\" cellpadding=\"10\" cellspacing=\"1\">
		<tr>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Sub Total</th>
			<th>Aksi</th>
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
				<td><a href=\"delete.php?idProduk=$dt[idProduk]&idKeranjang=$idKeranjang&jumlah=$dt[jumlah]\" onClick=\"return confirm('Anda yakin ingin menghapus?')\">Hapus</a></td>
			</tr>";
		}
              echo "</table>";
                echo "<h1>Total Biaya Belanja Anda: Rp. $total</h1>";
                echo $jumlah;
                echo "</div>";
			$resultuser = mysqli_query($mysqli, "SELECT * FROM user WHERE idUser = '$idUser'");
			while ($df = mysqli_fetch_array($resultuser, MYSQLI_ASSOC)){
			$result3 = mysqli_query($mysqli, "INSERT INTO checkout(idUser,a_checkout) VALUES ('$idUser','$df[alamat])");
				
    		header('Location:checkout.php');
			}
     }
    }
     	
		/*
		$cekUdahAda = mysqli_query($mysqli, "SELECT * FROM keranjang,detailkeranjang,produk WHERE idUser ='".$idUser."' and 
				detailKeranjang.idProduk = ' " . $idProduk . " ' and produk.idProduk=detailkeranjang.idProduk");

			if(mysqli_num_rows($cekUdahAda) < 0) {
				$result = mysqli_query($mysqli, "INSERT INTO detailkeranjang(idKeranjang, idProduk, jumlah) VALUES ('$idKeranjang','$idProduk', $jumlah)");
				if($result) {
				header('Location: keranjang.php');
				} else {
					 die('Invalid query: ' . mysql_error());
				}
			} else {
				$query = "UPDATE detailkeranjang SET jumlah=jumlah" . $jumlah . " WHERE idKeranjang='" . $idKeranjang . "'";
				$result = mysqli_query($mysqli, $query);
				if($result) {
				echo '<div style=margin-top:500px>' . $query . '</div>';
				} else {
					 die('Invalid query: ' . mysql_error());
				}
			}*/
	echo "<div style=\"margin-top:500px;width: 500px;height:300px\">
		uwooooo" .$idUser. "
		</div>";

			
			/*
		echo "<div class='container'>";
		echo "<table>
		<th>
			<td>Nama</td>
			<td>Jumlah</td>
			<td>Harga</td>
			<td>Sub Total</td>
			<td>Aksi</td>
		</th>";
		
		         $result = mysqli_query($mysqli, "SELECT * FROM keranjang,detailkeranjang,produk WHERE idUser ='".$idUser. '"');
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
				<td><a href=\"delete.php?idProduk=$dt[idProduk]\" onClick=\"return confirm('Anda yakin ingin menghapus?')\">Hapus</a></td>
			</tr>";
                }
                echo "</table>";
                echo "<h1>$total</h1>";
                echo "</div>";
                break;*/
            }
?>
</body>