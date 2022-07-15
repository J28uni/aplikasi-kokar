<?php
require_once "../db/db.php";

$act            = isset($_POST['act']) ? $_POST['act'] : "";
# Main Data
$id             = isset($_POST['id']) ? $_POST['id'] : 0;
$karyawan_id    = isset($_POST['karyawan_id']) ? $_POST['karyawan_id'] : 0;
$tanggal        = isset($_POST['tanggal']) ? $_POST['tanggal'] : "";
$cabang         = isset($_POST['cabang']) ? $_POST['cabang'] : "";

#Detail Data
$waktu          = isset($_POST['waktu']) ? $_POST['waktu'] : "";
$kegiatan       = isset($_POST['kegiatan']) ? $_POST['kegiatan'] : "";
$status         = isset($_POST['status']) ? $_POST['status'] : 0;

//action untuk area coordinator
if ($act == "add") {
    $query      = "INSERT INTO todo (karyawan_id, tanggal, cabang) VALUES ($karyawan_id,'$tanggal','$cabang') ";
    $run_query  = $db->query($query);
    $last_id    = $db->lastInsertId();

    if ($run_query) {
        
        foreach ($waktu as $key => $val) {
            $query_detail   = "INSERT INTO detail_todo (todo_id, waktu, kegiatan, `status`) VALUES($last_id, '".$waktu[$key]."', '".$kegiatan[$key]."', '".$status[$key]."') ";
            $db->query($query_detail);
        }        
		
		echo"<script>alert('BERHASIL DISIMPAN')</script>";
		echo"<meta http-equiv='refresh' content='0;url=../adminactivity.php'/>";
        
    } else {
        echo "<script>alert('Gagal di simpan')</script>";
//        echo "<meta http-equiv='refresh' content='0;url=../activity.php?pages=todo'>";
		echo"<meta http-equiv='refresh' content='0;url=../adminactivity.php'/>";
    }
	
//action untuk admin
} elseif ($act == "update") {
    $query      = "UPDATE todo SET karyawan_id=$karyawan_id, tanggal='$tanggal', cabang='$cabang' WHERE id=$id ";
    $run_query  = $db->query($query);

    $db->query("DELETE FROM detail_todo WHERE todo_id=$id");
    if ($run_query) {
        foreach ($waktu as $key => $val) {
            $query_detail   = "INSERT INTO detail_todo (todo_id, waktu, kegiatan, `status`) VALUES($id, '".$waktu[$key]."', '".$kegiatan[$key]."', '".$status[$key]."') ";
            $db->query($query_detail);
        }    
        echo "<script>alert('Berhasil di simpan')</script>";
//        echo "<meta http-equiv='refresh' content='0;url=../activity.php?pages=todo'>";
		echo "<meta http-equiv='refresh' content='0;url=../adminactivity.php?pages=adminviewtodo'>";
    } else {
        echo "<script>alert('Gagal di simpan')</script>";
        echo "<meta http-equiv='refresh' content='0;url=../adminactivity.php?pages=adminviewtodo'>";
    }
} 

//action untuk admin
if (isset($_GET['act'])) {
    if ($_GET['act'] == "delete") {
        $query      = "DELETE FROM todo WHERE id=".$_GET['id'];
        $run_query  = $db->query($query);
    
        if ($run_query) {
            $db->query("DELETE FROM detail_todo WHERE todo_id=".$_GET['id']);
            echo "<script>alert('Berhasil di hapus')</script>";
//            echo "<meta http-equiv='refresh' content='0;url=../activity.php'>";
			echo "<meta http-equiv='refresh' content='0;url=../adminactivity.php?pages=adminviewtodo'>";
        } else {
            echo "<script>alert('Gagal di hapus')</script>";
            echo "<meta http-equiv='refresh' content='0;url=../adminactivity.php?pages=adminviewtodo'>";
        }
    }
}
