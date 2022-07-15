<?php
require_once "../kokar/db/db.php";

$nik = isset($_POST['nik']) ? $_POST['nik'] : "";
$nama = isset($_POST['nama']) ? $_POST['nama'] : "";
$nm_toko = isset($_POST['nm_toko']) ? $_POST['nm_toko'] : "";
// $latitude = isset($_POST['latitude']) ? $_POST['latitude'] : "";
// $longitude = isset($_POST['longitude']) ? $_POST['longitude'] : "";
$current = isset($_POST['current']) ? $_POST['current'] : "";
$waktu = date("Y-m-d H:i:s");
$cekpoin = isset($_POST['cekpoin']) ? $_POST['cekpoin'] : "";

// $sql = "INSERT INTO peta (nik, nama, nm_toko, latitude, longitude, waktu, cekpoin) VALUES ('$nik','$nama','$nm_toko','$latitude','$longitude','$waktu','$cekpoin')";
$sql = "INSERT INTO peta (nik, nama, nm_toko, current, waktu, cekpoin) VALUES ('$nik','$nama','$nm_toko','$current','$waktu','$cekpoin')";
$exe = $db->query($sql);

if ($exe) {
    echo "<script>alert('Berhasil Absen')</script>";
    echo"<meta http-equiv='refresh' content='0;url=cari.php'/>";
} else {
    echo "<script>alert('Gagal Absen')</script>";
    echo"<meta http-equiv='refresh' content='0;url=cari.php'/>";
}