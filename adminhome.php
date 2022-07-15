<?php
session_start();
if (!isset($_SESSION['nik'])) {
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

    <title>Input Data Karyawan</title>
</head>
<body>

<!--Navigasi-->
<nav class="navbar navbar-expand-md navbar-light bg-success fixed-top">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="true" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarToggler">
	<a class="navbar-brand nav-link active bg-dark" href="adminhome.php"><img src="img/home.svg" height="30px" width="30"></a>
	<ul class="navbar-nav mr-auto mt-2 mt-md-0">
		<li class="nav-item">
		<a class="nav-link" href="adminreportabsen.php">Report Absensi</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="#">Report Lokasi</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="adminactivity.php">Report Activity</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="logout.php"><b>KELUAR</b></a>
		</li>
	</ul>
	</div>
</nav>

<h1>Welcome, Admin</h1>	  
	
	
<!--tanggal device-->
<div class="container" style="margin-top: 5rem;">
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
				echo "<p><b>Selamat Pagi !!</b></p>";
			} elseif (($a>11) && ($a<=14)) {
				echo "<p><b>Selamat Siang !!</b></p>";
			} elseif (($a>14) && ($a<=18)) {
				echo "<p><b>Selamat Sore !!</b></p>";
			} else {
				echo "<p><b> Selamat Malam</b></p>";
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
<hr /> 



<!--Form Input Data-->
	<div class="card" style="max-width: 800px;">
		<div class="card-body">
		<!-- Form ngarah action buat handle datanya kemana action_inputdata.php -->
		<form method="post" action="adminproses/adminhome_action.php" enctype="multipart/form-data">
		<div class="form-row">
			<div class="col-md-4 mb-3">
			<label for="validationTooltip01">NIK</label>
			<input type="text" class="form-control" id="nik" name="nik" required>
			</div>
			<div class="col-md-4 mb-3">
			<label for="validationTooltip02">Nama</label>
			<input type="text" class="form-control" id="nama" name="nama" required>
			</div>
		</div>
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="input-group">
			<select class="custom-select" name="jabatan" style="width: 150px;">
				<option selected>----Pilih Jabatan----</option>
				<option value="Area Coordinator">Area Coordinator</option>
				<option value="Area Manager">Area Manager</option>
				<option value="Admin">Admin</option>
			</select>
				</div>
		</div>
		<div class="form-row">
			
				<label class="col-sm-2 col-form-label">Cabang</label>
				<div class="input-group">
			<select class="custom-select" name="cabang" style="width: 150px;">
				<option selected>----Pilih Cabang----</option>
				<option value="Head Office">Head Office</option>
				<option value="Medan">Medan</option>
				<option value="Bitung">Bitung</option>
				<option value="Bekasi">Bekasi</option>
				<option value="Samarinda">Samarinda</option>
				<option value="Makasar">Makasar</option>
				<option value="Palu">Palu</option>
				<option value="Jogjakarta">Jogjakarta</option>
				<option value="Pasuruan">Pasuruan</option>
				<option value="Manado">Manado</option>
				<option value="Kendari">Kendari</option>
				<option value="Ambon">Ambon</option>
			</select>
				</div>
		</div>
			<br>
			<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="File">Id Barcode</span>
			</div>
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="File" name="File" aria-describedby="inputGroupFileAddon01">
				<label class="custom-file-label" for="inputGroupFile01"></label>
			</div>
			</div>
		</div>
		<button class="btn btn-primary m-3" type="submit" name="insert" id="simpan" value="simpan">SIMPAN</button>
		<button class="btn btn-outline-info m-3" type="reset" name="reset" id="reset" value="reset">RESET</button>
		</form>
		</div>
	</div>  
</div> 	
</body>
</html>