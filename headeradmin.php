<?php session_start(); ?>
<html>
<head>
	<title>W3Pomade</title>
	<link href="style.css" rel="stylesheet" type="text/css">
<!-- <link href="bootstrap-3.3.7-dist\css\bootstrap.min.css" rel="stylesheet" type="text/css"> -->
<script type='text/javascript' src='jquery-3.2.1.min.js'></script>
	 <script type="text/javascript" src='jssor.slider-23.1.5.min.js'></script> 
</head>
<body>
    <main>

          <nav class="floating-logo">
          <a href="homeadmin.php"><img src='img/logo.png'></a>
          </nav>

          <nav class="floating-menu">
          <ul>
            <li><a href="homeadmin.php"><font size="5">home</font></a></li>
            <li><a href="produkadmin.php"><font size="5">produk</font></a></li>
			  <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn"><font size="5">member</font></a>
              <div class="dropdown-content">
                <a href="user.php">List Member</a>
                <a href="statusmember.php">Status</a>
              </div>
            </ul>
            </nav>
            <nav class="floating-tool">
             <ul>
              <?php
                if(isset($_SESSION['valid'])) {
                      echo "<li class=\"dropdown\"><a href=\"javascript:void(0)\" class=\"dropbtn\"><font size=\"5\">".$_SESSION['username']."</font>"."</a>";
                      echo "<div class=\"dropdown-content\">
                              <a href=\"pengaturan.php\">Pengaturan</a>
                              <a href=\"registeradmin.php\">Daftar Admin</a>
                              <a href=\"logout.php\">Logout</a>
                            </div></li>";
                }else{
					echo "<li class=\"dropdown\"><a href=\"javascript:void(0)\" class=\"dropbtn\"><font size=\"3\">Login</font>"."</a>";
                      echo "<div class=\"dropdown-content\">
                              <a href=\"login.php\">Login Member</a>
                              <a href=\"loginadmin.php\">Login Admin</a>
                            </div></li>";
//                        echo "<li><a href=\"login.php\">login</a></li>";
                                    }
              echo "</ul>"; ?>
              </nav>
    </main>

</body>
</html>