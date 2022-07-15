<!doctype html>
<html lang="en"> 
<head> 
<!-- Required meta tags --> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

<!--bootstrap-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-3.4.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<style>
/* Start with core styles outside of a media query that apply to mobile and up */
/* Global typography and design elements, stacked containers */
body { font-family: Helvetica, san-serif; }
H1 { color: green; }
a:link { color:purple; }

/* Stack the two content containers */
.main,
.sidebar { display:block; width:100%; }

/* First breakpoint at 576px */
/* Inherits mobile styles, but floats containers to make columns */
@media all and (min-width: 36em){
.main { float: left; width:60%; }
.sidebar { float: left; width:40%; }
}

/* Second breakpoint at 800px */
/* Adjusts column proportions, tweaks base H1 */
@media all and (min-width: 50em){
.main { width:70%; }
.sidebar { width:30%; }

/* You can also tweak any other styles in a breakpoint */
H1 { color: blue; font-size:1.2em }
}
</style>

<!-- Script Peta-->
<!-- <script src="http://code.google.com/apis/gears/gears_init.js" type="text/javascript" charset="utf-8"></script> -->
<script src="mapjs/geo.js" type="text/javascript" charset="utf-8"></script>
<script src="mapjs/gmaps.js" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script> 

<!-- style map-->
<script>
function initialize_map()
{
var myOptions = {
zoom: 15,
mapTypeControl: true,
mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
navigationControl: true,
navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
mapTypeId: google.maps.MapTypeId.ROADMAP      
}
map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
}
function initialize()
{
if(geo_position_js.init())
{
document.getElementById('current').innerHTML="Receiving...";
geo_position_js.getCurrentPosition(show_position,function(){document.getElementById('current').innerHTML="Couldn't get location"},{enableHighAccuracy:true});
}
else
{
document.getElementById('current').innerHTML="Functionality not available";
}
}

function show_position(p)
{
//document.getElementById('current').innerHTML = +p.coords.latitude.toFixed(2)+", "+p.coords.longitude.toFixed(2);
//document.getElementById('current').innerHTML="latitude="+p.coords.latitude.toFixed(2)+" longitude="+p.coords.longitude.toFixed(2);
$("#current").val(p.coords.latitude.toFixed(2)+","+p.coords.longitude.toFixed(2));

//if ('Geolocation' in navigator){
//console.log('Geolocation Available');
//navigator.geolocation.getCurrentPosition(position => {
//console.log(position);
//let latlng = position.coords.latitude+","+position.coords.longitude;
//document.getElementById('current').value = position.coords.latitude+","+position.coords.longitude;
//})
//}


var pos=new google.maps.LatLng(p.coords.latitude,p.coords.longitude);
map.setCenter(pos);
map.setZoom(16);

var infowindow = new google.maps.InfoWindow({
content: "<strong>Lokasi Saya</strong>"
});

var marker = new google.maps.Marker({
position: pos,
map: map,
title:"You are here"
});




google.maps.event.addListener(marker, 'click', function() {
infowindow.open(map,marker);
});
}
</script>
<style>
body {
font-family: Helvetica;
font-size:11pt;
padding:0px;
margin:0px;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
#title {
background-color:#e22640;
padding:5px;
}
#current {
font-size:10pt;
padding:5px;
}
</style>
<title>
KOKAR 
</title> 

</head> 
<body onload="initialize_map();initialize()"> 

<!--Navigasi-->
<nav class="navbar navbar-expand-md navbar-light bg-success fixed-top">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
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
echo "<p><b>Selamat Pagi !!</b></p>";
}
else if (($a>11) && ($a<=14))
{
echo "<p><b>Selamat Siang !!</b></p>";}
else if (($a>14) && ($a<=18)){
echo "<p><b>Selamat Sore !!</b></p>";}
else { echo "<p><b> Selamat Malam !!</b></p>";}
?>
</div>
<div class="col">
<?php 
//date_default_timezone_set('Asia/Jakarta');
//$jam=date("H:i:s");
echo "<b>". $jam." "."</b>";
?>
</div>
</div>
</div> 

<!-- Input Form NIK dan Nama -->
<nav class="navbar navbar-light justify-content-center">
<form class="form-inline" action="cariconfig.php" method="post">
<input name="nik" type="text" id="nik" class="form-control ml-3 mt-2 p-2" placeholder="Masukan NIK" required>
<input name="nama" type="text" id="nama" class="form-control ml-3 mt-2 p-2" placeholder="Masukan Nama" required>
<input name="nm_toko" type="text" id="nm_toko" class="form-control ml-3 mt-2 p-2" placeholder="Masukan Nama Toko" required>
<input type="hidden" name="current" id="current" class="form-control ml-3 mt-2 p-2">
<input type="hidden" name="cekpoin" id="cekpoin" value="absen">
<button type="submit" class="btn btn-warning p-2" value="kirim" style="width: 20%"><b>KIRIM</b></button>
</form>
</nav>
<!--IMAGE PETA-->
<div id="map_canvas" style="height: 480px; width: 100%; margin-bottom: 70px;"></div>


</body> 
</html>