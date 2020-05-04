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
	echo "<h1>STATUS MEMBER</h1>";
echo "</div>";	
 					if(isset($_POST['ubah']))   
						  {
						     $idKeranjang = $_GET['idKeranjang'];
						   if(empty($_POST['status']))  
						   {  
						   echo "Anda belum memilih!";  
						   }else if($_POST['status'] == 'Belum Dibayar')
								   	{
								   		$result = mysqli_query($mysqli, "UPDATE keranjang SET status='Belum Dibayar' WHERE idKeranjang='$idKeranjang'");
								   	}						   	 
								   else	if($_POST['status'] == 'Sudah Dibayar')
								   	{
								   		$result = mysqli_query($mysqli, "UPDATE keranjang SET status='Sudah Dibayar' WHERE idKeranjang='$idKeranjang'");
								   	}
								    	else
								   	{
								   		$result = mysqli_query($mysqli, "UPDATE keranjang SET status='Sudah Dikirim' WHERE idKeranjang='$idKeranjang'");
								   	}
						    	}
						
     	echo "<div class='container'>";
		  echo "<table id=\"keranjang\" cellpadding=\"10\" cellspacing=\"1\">
		<tr>
			<th>Nama Member</th>
			<th>No Transaksi</th>
			<th>Status</th>
			<th>Ubah Status</th>
			<th>Aksi</th>
		</tr>";
		         $result = mysqli_query($mysqli, "SELECT nama,idKeranjang,status from user,keranjang WHERE user.idUser = keranjang.idUser");
                 while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   
                 	
		echo "<tr>
				<td>$dt[nama]</td>
				<td>$dt[idKeranjang]</td>
				<td>$dt[status]</td>
				<td> <form action=\"statusmember.php?idKeranjang=$dt[idKeranjang]\" method=\"post\">   
						 <select name=\"status\">  
						 <option value=\"\">Pilih Status</option>  
						 <option value=\"Belum Dibayar\">Belum Dibayar</option>  
						 <option value=\"Sudah Dibayar\">Sudah Dibayar</option>  
						 <option value=\"Sudah Dikirim\">Sudah Dikirim</option>  
						 </select>   
						 <input type=\"submit\" name=\"ubah\" value=\"Ubah\">   
					</form> </td>
				<td><a href=\"detailmember.php?idKeranjang=$dt[idKeranjang]&nama=$dt[nama]\">Lihat Rincian |</a><a href=\"hapustransaksi.php?idKeranjang=$dt[idKeranjang]\" confirm('Anda yakin ingin menghapus?>| Hapus Transaksi</a></td>
			</tr>";
		}
              echo "</table>";
                echo "</div>";
include('footeradmin.php');
?>
</body>