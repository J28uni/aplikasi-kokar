<?php
require_once "./db/db.php";
$get_kebutuhan = $db->query("SELECT * FROM kebutuhan WHERE id=".$_GET['id']);
$data_set = $get_kebutuhan->fetch();

$get_tipe = $db->query("SELECT * FROM tipe_kebutuhan");
?>
<form action="proses/kebutuhan_action.php" method="post">
    <input type="hidden" name="act" value="edit">
    <input type="hidden" name="id" value="<?=$data_set['id'];?>">
    <label>Tipe Kebutuhan</label>
    <select name="tipe_kebutuhan" class="form-control">
        <?php
        foreach ($get_tipe->fetchAll() as $list) {
            ?>
                <option value="<?=$list['id'];?>" <?=$list['id'] == $data_set['tipe_kebutuhan'] ? "selected" : "";?>><?=$list['nama_tipe'];?></option>
            <?php
        }
        ?>
    </select>
    <br>
    <label>Deskripsi</label>
    <input type="text" class="form-control" name="deskripsi" value="<?=$data_set['deskripsi'];?>" />
    <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
</form>

