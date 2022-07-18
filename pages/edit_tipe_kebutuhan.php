<?php
require_once "./db/db.php";
$get_data = $db->query("SELECT * FROM tipe_kebutuhan WHERE id=".$_GET['id']);
$data_set = $get_data->fetch();
?>
<form action="proses/tipe_kebutuhan_action.php" method="post">
    <input type="hidden" name="act" value="edit">
    <input type="hidden" name="id" value="<?=$data_set['id'];?>">
    <label>Nama Tipe Kebutuhan</label>
    <input type="text" class="form-control" name="nama_tipe" value="<?=$data_set['nama_tipe'];?>" />
    <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
</form>

