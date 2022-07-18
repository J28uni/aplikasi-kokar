<!doctype html>
<html lang="en"><head> 
<!-- Required meta tags --> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

<!-- Required meta tags -->
<!--bootstrap-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-3.4.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
var x = document.getElementById("geolokasi");

// opsi 1
// if ("geolocation" in navigator) {
//   console.log('Geolocation Available');
//   navigator.geolocation.getCurrentPosition(position => {
// 	 document.getElementById('latitude').value =+position.coords.latitude; //tanda + dibuat untuk dirubah ke tipe data string atau text
// 	 document.getElementById('longitude').value =+position.coords.longitude;
//   });
// } else {
//   console.log('Geolocation Not Available');
// }


// opsi 2
if ("geolocation" in navigator) {
		console.log('Geolocation Available');
        navigator.geolocation.getCurrentPosition(position => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        document.getElementById('latitude').value =+lat;
        document.getElementById('longitude').value =+lon;
        // document.getElementById('longitude').textContent = lon;
        // console.log(position);
        });
    } else {
        console.log('Geolocation Not Available');
    }

	function showError(error) {
    switch(error.code) {
    case error.PERMISSION_DENIED:
        x.innerHTML = "User denied the request for Geolocation."
        break;
    case error.POSITION_UNAVAILABLE:
        x.innerHTML = "Location information is unavailable."
        break;
    case error.TIMEOUT:
        x.innerHTML = "The request to get user location timed out."
        break;
    case error.UNKNOWN_ERROR:
        x.innerHTML = "An unknown error occurred."
        break;
    }
	}

	
</script>	

	
<title>
KOKAR
</title> 

</head> 
<body> 
	
<!--Navigasi-->
<nav class="navbar navbar-expand-md navbar-light bg-success fixed-top">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" ria-expanded="true" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarToggler">
<a class="navbar-brand nav-link" href="home.php"><img src="img/home.svg" height="30px" width="30"></a>
<ul class="navbar-nav mr-auto mt-2 mt-md-0">
<li class="nav-item">
<a class="nav-link active bg-light" href="cari.php">Absensi</a>
</li>
<li class="nav-item">
<a class="nav-link" href="activity.php">Activity</a>
</li>
<li class="nav-item">
<a class="nav-link" href="report.php">Report</a>
</li>
<li class="nav-item">
<a class="nav-link" href="logout.php"><b>KELUAR</b></a>
</li>
</ul>
</div>
</nav>

<div class="row">
    <div class="col">
    <!--tanggal device-->
		<div class="container-fluid" style="margin-top: 5rem;">
		<div class="row" style="margin-top: 80">
			<div class="col">
				<align="right"><?php

                    $tanggal= mktime(date("m"), date("d"), date("Y"));
                    echo "<b>".date("d/M/Y", $tanggal)."</b>";

                ?></align>
			</div>
			<div class="col col-md-auto">
		<?php
            date_default_timezone_set('Asia/Jakarta');
            $jam=date("H:i:s");
            $a = date("H");
            if (($a>=4) && ($a<=11)) {
                echo "<b><br><h3>Selamat Pagi !!</h3></br></b>";
            } elseif (($a>11) && ($a<=14)) {
                echo "<p><b>Selamat Siang !!</b></p>";
            } elseif (($a>14) && ($a<=18)) {
                echo "<p><b>Selamat Sore !!</b></p>";
            } else {
                echo "<p><b> Selamat Malam !!</b></p>";
            }
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
    </div>
    <div class="col">2 of 2</div>
</div>
	


</hr >


<!-- Input Form NIK dan Nama -->
	<nav class="navbar navbar-light justify-content-center">
	<form class="form-inline" action="./cariconfig.php" method="post">
		<input name="nik" type="text" id="nik" class="form-control ml-3 mt-2 p-2" placeholder="Masukan NIK" required>
		<input name="nama" type="text" id="nama" class="form-control ml-3 mt-2 p-2" placeholder="Masukan Nama" required>
		<input name="nm_toko" type="text" id="nm_toko" class="form-control ml-3 mt-2 p-2" placeholder="Masukan Nama Toko" required>
		<input type="hidden" name="latitude" id="latitude" class="form-control ml-3 mt-2 p-2">
		<input type="hidden" name="longitude" id="longitude" class="form-control ml-3 mt-2 p-2">
		<input type="hidden" name="cekpoin" id="cekpoin" value="absen">
		<button type="submit" class="btn btn-warning rounded-pill" value="kirim"><b>KIRIM</b></button>
	</form>
	</nav>

</body> 
</html>
