<?php
require_once "../db/db.php";

$act            = isset($_POST['act']) ? $_POST['act'] : "";
$id             = isset($_POST['id']) ? $_POST['id'] : 0;
$tipe_kebutuhan = isset($_POST['tipe_kebutuhan']) ? $_POST['tipe_kebutuhan'] : 0;
$deskripsi      = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : "";

if ($act == "add") {
    $query = $db->query("INSERT INTO kebutuhan (tipe_kebutuhan, deskripsi) VALUES($tipe_kebutuhan, '".$deskripsi."')");
    if ($query) {
        echo"<script>alert('BERHASIL DISIMPAN')</script>";
		echo"<meta http-equiv='refresh' content='0;url=../kebutuhan.php'/>";
    } else {
        echo"<script>alert('GAGAL DISIMPAN')</script>";
		echo"<script>window.history.back()</script>";
    }
} elseif ($act == "edit") {
    $query = $db->query("UPDATE kebutuhan SET tipe_kebutuhan=$tipe_kebutuhan, deskripsi='".$deskripsi."' WHERE id=$id ");
    if ($query) {
        echo"<script>alert('BERHASIL DISIMPAN')</script>";
		echo"<meta http-equiv='refresh' content='0;url=../kebutuhan.php'/>";
    } else {
        echo"<script>alert('GAGAL DISIMPAN')</script>";
		echo"<script>window.history.back()</script>";
    }
} 

if (isset($_GET['act'])) {
    if ($_GET['act'] == "delete") {
        $query =$db->query("DELETE FROM kebutuhan WHERE id=".$_GET['id']);
        if ($query) {
            echo"<script>alert('BERHASIL DISIMPAN')</script>";
            echo"<meta http-equiv='refresh' content='0;url=../kebutuhan.php'/>";
        } else {
            echo"<script>alert('GAGAL DISIMPAN')</script>";
            echo"<script>window.history.back()</script>";
        }
    }
}