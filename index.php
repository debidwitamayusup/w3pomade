<?php include('header.php');?>
<?php
    $p = isset($_GET['p']) ? $_GET['p'] : '';
    switch($p) 
    {
     default :
     include('slider.php'); 
//including the database connection file
     echo "<div class=\"h1\">
     <h1><font color=white>Sedang Ramai</font></h1> 
     </div>";
include_once("connection.php");
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM produk");

        while($dt = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   
            echo "<div id=\"sub-br\" style=\"\">
                     <div id='min-desk' class=\"min-desk\">
                      <p>
                       <a href='?p=detProduk&idProduk=$dt[idProduk]'><img src=\"img/produk/$dt[gambarProduk]\" class=\"gambar\"/></a>
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
            echo "<div id=\"sub-br\" style=\"\">
                     <div id='min-desk' class=\"min-desk\">
                      <p>
                       <a href='?p=detProduk&idProduk=$dt[idProduk]'><img src=\"img/produk/$dt[gambarProduk]\" class=\"gambar\"/></a>
                       $dt[namaProduk]<br/>
                       Harga Rp. $dt[harga]
                      </p>
                      </div>
                     </div>";


                        if(!isset($_SESSION['valid'])) {
                           echo "<form  method=\"POST\" action=\"login.php\">";
                        }
                        else
                        {
                            echo "<form method=\"POST\" action=\"keranjang.php?aksi=tambah\">";
                        }
                     echo  "<table align=center>
                            <tr><td>Jumlah</td>
                             <input type=\"hidden\" name=\"p\" value=\"tambah\">
                            <td><input type=\"text\" name=\"jumlah\"></td>
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
