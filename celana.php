<?php include('header.php');?>
<?php
    $p = isset($_GET['p']) ? $_GET['p'] : '';
    switch($p) 
    {
     default :
//including the database connection file
    include_once("connection.php");
			
echo "<div style=\"margin-top:80px;background-color:black;color:white;text-align:center;\">
			<h1>MURRAY'S POMADE</h1>
		</div>";
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE kategori = 'celana'");

        while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   
            echo "<div id=\"sub-br\" style=\"\">
                     <div id='min-desk' class=\"min-desk\">
                      <p>
                       <a href='?p=detProduk&idProduk=$dt[idProduk]' title=\"Klik untuk melihat rincian\"><img src=\"img/produk/$dt[gambarProduk]\" class=\"gambar\"/></a>
                       $dt[namaProduk]<br/>
                       Harga Rp. $dt[harga]
                      </p>
                     </div>
                     
                    </div>";
            }
                break;
                case "detProduk":
                include_once("connection.php");
                echo  "<div id=\"detailProduk\">";
                $result = mysqli_query($mysqli, "SELECT * FROM produk WHERE idProduk='".$_GET['idProduk']."'");
                 while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<div id=\"sub-brdetail\" style=\"\">
                     <div id='min-deskdetail' class=\"min-deskdetail\">
                      <p>
                       <a href='?p=detProduk&idProduk=$dt[idProduk]'><img src=\"img/produk/$dt[gambarProduk]\" class=\"gambar\"/></a>
                       $dt[namaProduk]<br/>
                       Harga Rp. $dt[harga] || Tersedia : $dt[stok] pcs
                      </p>
                      </div>
					
                     </div>";
					
					 echo "<h3> $dt[deskripsi1]</h3>";
					 echo "<h3> $dt[deskripsi2]</h3>";
					 echo "<h3> $dt[deskripsi3]</h3>";
					 echo "<h3> $dt[deskripsi4]</h3>";
					 echo "<h3> $dt[deskripsi5]</h3>";
					 echo "<h3> $dt[deskripsi6]</h3>";	 

                        if(!isset($_SESSION['valid'])) {
                                echo "<form  method=\"POST\" action=\"loginmurrays.php?eksen=adaProduk&p=detProduk&idProduk=$dt[idProduk]\">";
                            echo "<input type=\"hidden\" name=\"p\" value=\"adaProduk\">";
                             echo "<input type=\"hidden\" name=\"detProduk\" value=\"detProduk\">";
                             //echo "<input type\"hidden\" name=\"idProduk\" value=\"$dt[idProduk]\">";
                        }
                        else
                        {
                            echo "<div class=\"njing\">";
							echo "<form method=\"POST\" action=\"keranjang.php?aksi=tambah\">";
                        }
                     echo  "<table align=left>
                            <tr><td width=\"60px\">Jumlah</td>
                            <td><input type=\"text\" name=\"jumlah\"></td>
                             <input type=\"hidden\" name=\"p\" value=\"tambah\">
                            </tr>
                            <input type=\"hidden\" name=\"idProduk\" value=\"$dt[idProduk]\">
                            <td> <button> Tambahkan ke Keranjang </button></td>
                            </table>
                            </form>
                    </div>";
            }       
        
                break;

				 }


        ?>
