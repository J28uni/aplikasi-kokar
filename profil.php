<!doctype html>
<html lang="en"> 
<head> 
<!-- Required meta tags -->
<meta http-equiv="refresh" content="60" />
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
						
<!-- Bootstrap CSS --> 
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
 
<title>
KOKAR Alfamidi
</title> 

</head> 
<body> 
	
	
	<!-- navigasi menu bootstrap samping -->
		<div id="main">
			<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
			<nav class="nav navbar-nav bg-primary align-content-end"><img src="img/logoekalfamidi.svg" width="100%;" height="50rem;" alt="Responsive image"></nav>
		
	
		<div id="mySidenav" class="sidenav bg-light">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="logout.php">LOGOUT</a>
		  <a href="#">SIGN UP</a>
		</div>
		</div>

		<script>
		function openNav() {
		  document.getElementById("mySidenav").style.width = "250px";
		  document.getElementById("main").style.marginLeft = "250px";
		  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
		}

		function closeNav() {
		  document.getElementById("mySidenav").style.width = "0";
		  document.getElementById("main").style.marginLeft= "0";
		  document.body.style.backgroundColor = "white";
		}
		</script>


<!--Bottom Navigasi-->
	<nav class="navbar bg-primary fixed-bottom justify-content-center">
		<a class="navbar-brand nav-link active" href="home.php">
			<img src="img/home.svg" width="30" height="30" alt="Responsive image">
		</a>
		<a class="navbar-brand nav-link" href="cari.php">
			<img src="img/pin.svg" width="90" height="30" alt="Responsive image">
		</a>
		<a class="navbar-brand nav-link" href="profil.php">
			<img src="img/kontak.svg" width="30" height="30" alt="Responsive image">
		</a>
	</nav>
	
<!--tanggal device-->
<div class="container">
  <div class="row">
    <div class="col">
		<?php 
			$tanggal= mktime(date("m"),date("d"),date("Y"));
      		echo "<b>".date("d/M/Y", $tanggal)."</b>";
		?>
    </div>
    <div class="col col-md-auto">
      <?php
			date_default_timezone_set('Asia/Jakarta');
			$jam=date("H:i:s");
			$a = date ("H");
			if (($a>=4) && ($a<=11)){
			echo "<p><b>Selamat Pagi !!</b></p>";
			}
			else if(($a>11) && ($a<=14))
			{
			echo "<p><b>Selamat Siang !!</b></p>";}
			else if (($a>14) && ($a<=18)){
			echo "<p><b>Selamat Sore !!</b></p>";}
			else { echo "<p><b> Selamat Malam</b></p>";}
     ?>
    </div>
    <div class="col">
	  <?php 
//			date_default_timezone_set('Asia/Jakarta');
//			$jam=date("H:i:s");
			echo "<b>". $jam." "."</b>";
	  ?>
    </div>
  </div>
 </div>	
	
</body> 
</html>