    <?php
    require_once "db/db.php";
    $get_all        = "SELECT A.*, B.nama FROM todo A LEFT JOIN karyawan B ON A.karyawan_id = B.id ";
    $exe_query      = $db->query($get_all);
    $data_record    = $exe_query->fetchAll();
    ?>
    <div class="container mt-4 shadow">
        <h4>DAILY ACTIVITY AC<span class="float-right">
<!--			<a href="?pages=add_todo" class="btn btn-sm btn-primary">Tambah</a>-->
		</span></h4>
        <table class="table table-bordered table-sm">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
					<th>Tanggal</th>
					<th>Cabang</th>
					<th>Karyawan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($exe_query->rowCount() > 0) {
                    foreach ($data_record as $key => $val) {
                ?>
                        <tr>
							<td width=1%><?= $val['id'];?></td>
                            <td style="width:10%"><?= $val['tanggal']; ?> </td>
                            <td style="width:15%"><?= $val['cabang']; ?></td>
							<td><?= $val['nama']; ?></td>
                            <td style="width:12%">
                                <a href="?pages=adminedit_todo&id=<?= $val['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="proses/todo_action.php?act=delete&id=<?= $val['id']; ?>" class="btn btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
