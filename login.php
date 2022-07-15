<?php
require_once"db/db.php";
$nik=$_POST["nik"];
$password=md5($_POST["password"]);
// $akses = $_POST['akses'];

// $cek=$db->query("select * from user where nik='$nik' and password='$password' AND akses='".$akses."' ");
$cek=$db->query("select * from user where nik='$nik' and password='$password'");
$cekCount = $cek->rowCount();

if ($cekCount < 1){
    echo"<script>alert('NIK atau password salah')</script>";
    echo"<meta http-equiv='refresh' content='0;url=index.html'/>";
}else{
	session_start();
	$data_set = $cek->fetch();
	$get_karyawan = $db->query("SELECT * FROM karyawan WHERE nik='".$data_set['nik']."' ");
	$data_karyawan = $get_karyawan->fetch();

	$_SESSION['nik'] = $nik;
	$_SESSION['akses'] = $data_set['akses'];
	$_SESSION['id_karyawan'] = $data_karyawan['id'];
	$_SESSION['nama'] = $data_karyawan['nama'];
//	echo"<script>alert('anda berhasil login')</script>";
	if ($data_set['akses'] == "am") {
		echo"<meta http-equiv='refresh' content='0;url=am_home.php'/>";
	} elseif ($data_set['akses'] == "ac"){
		echo"<meta http-equiv='refresh' content='0;url=home.php'/>";
	} else {
		echo"<meta http-equiv='refresh' content='0;url=adminhome.php'/>";
	}
	
}