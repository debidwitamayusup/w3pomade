<?php session_start(); ?>
<html>
<head>
	<title>W3Pomade</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="bootstrap-3.3.7-dist\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	 <script type='text/javascript' src='jquery-3.2.1.min.js'></script>
	 <script type="text/javascript" src='jssor.slider-23.1.5.min.js'></script>
</head>
<body>
<main>

<nav class="floating-logo">
<a href="#"><img src='img/logo.png'></a>
</nav>

<nav class="floating-menu">
<ul>
  <li><a href="index.php"><font size="5">home</font></a></li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn"><font size="5">kategori</font></a>
    <div class="dropdown-content">
      <a href="#">Murray's</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </li> 
  <li><font size="5">artikel</font></li>
  </ul>
  </nav>
<nav class="floating-tool">
 <ul>
 <li><a href="#"><img src="img/find.png"/></a></li>
  <li><a href="keranjang.php"><img src="img/keranjang.png"></li>
  <?php
    if(isset($_SESSION['valid'])) {
          echo "<li class=\"dropdown\"><a href=\"javascript:void(0)\" class=\"dropbtn\"><font size=\"5\">".$_SESSION['nama']."</font>"."</a>";
          echo "<div class=\"dropdown-content\">
                  <a href=\"pengaturan.php\">Pengaturan</a>
                  <a href=\"logout.php\">Logout</a>
                </div></li>";
    }else{
            echo "<li><a href=\"login.php\">login</a></li>";
                        }
  echo "</ul>"; ?>
  </nav>
</main>
</body>
</html>