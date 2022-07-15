<?php
session_start();
if(!isset($_SESSION['nik'])){
echo"<meta http-equiv='refresh' content='0;url=index.html'/>";
};
?>
<!doctype html>
<html lang="en"> 
<head> 
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--bootstrap-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

  
<title>
KOKAR Alfamidi
</title> 

</head> 
<body>

<!--Navigasi-->
<nav class="navbar navbar-expand-md navbar-light bg-success fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarToggler">
    <a class="navbar-brand nav-link" href="adminhome.php"><img src="img/home.svg" height="30px" width="30"></a>
    <ul class="navbar-nav mr-auto mt-2 mt-md-0">
      <li class="nav-item">
        <a class="nav-link" href="adminreportabsen.php">Report Absensi</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Report Lokasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active bg-light" href="adminactivity.php">Report Activity</a>
	  </li>
	  <li class="nav-item">
        <a class="nav-link" href="logout.php"><b>KELUAR</b></a>
      </li>
    </ul>
  </div>
</nav>

<!--tanggal device-->
<div class="container-fluid" style="margin-top: 5rem;">
  <div class="row" style="margin-top: 80">
    <div class="col">
		<align="right"><?php	
			
			$tanggal= mktime(date("m"),date("d"),date("Y"));
      		echo "<b>".date("d/M/Y", $tanggal)."</b>";
			
		?></align>
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

<hr/>
	
<div class="container">	
<?php
    require_once "adminactivity_menu.php";
?>
<?php
    $pages = isset($_GET['pages']) ? $_GET['pages'] : "";

    if($pages == "") {
        require_once "adminactivity.php";
    } else {
        if (file_exists("pages/" . $pages . ".php")) {
            require_once "pages/". $pages . ".php";
        } else {
          require_once "adminactivity.php";
        }

    }
    ?>


</body> 
</html>