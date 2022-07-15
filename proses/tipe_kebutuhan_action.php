<?php
require_once "../db/db.php";

$act        = isset($_POST['act']) ? $_POST['act'] : "";
$id         = isset($_POST['id']) ? $_POST['id'] : 0;
$nama_tipe  = isset($_POST['nama_tipe']) ? $_POST['nama_tipe'] : "";

if ($act == "add") {
    $query = $db->query("INSERT INTO tipe_kebutuhan (nama_tipe) VALUES('".$nama_tipe."')");
    if ($query) {
        echo"<script>alert('BERHASIL DISIMPAN')</script>";
		echo"<meta http-equiv='refresh' content='0;url=../tipe_kebutuhan.php'/>";
    } else {
        echo"<script>alert('GAGAL DISIMPAN')</script>";
		echo"<script>window.history.back()</script>";
    }
} elseif ($act == "edit") {
    $query = $db->query("UPDATE tipe_kebutuhan SET nama_tipe='".$nama_tipe."' WHERE id=$id ");
    if ($query) {
        echo"<script>alert('BERHASIL DISIMPAN')</script>";
		echo"<meta http-equiv='refresh' content='0;url=../tipe_kebutuhan.php'/>";
    } else {
        echo"<script>alert('GAGAL DISIMPAN')</script>";
		echo"<script>window.history.back()</script>";
    }
} 

if (isset($_GET['act'])) {
    if ($_GET['act'] == "delete") {
        $query =$db->query("DELETE FROM tipe_kebutuhan WHERE id=".$_GET['id']);
        if ($query) {
            echo"<script>alert('BERHASIL DISIMPAN')</script>";
            echo"<meta http-equiv='refresh' content='0;url=../tipe_kebutuhan.php'/>";
        } else {
            echo"<script>alert('GAGAL DISIMPAN')</script>";
            echo"<script>window.history.back()</script>";
        }
    }
}