    <?php
    require_once "db/db.php";
    $get_data = $db->query("SELECT * FROM todo WHERE id=" . $_GET['id']);
    $data_set = $get_data->fetch();
    ?>
    <div class="container mt-4 shadow">
        <h4>Activitas Area Coordinator</h4>
<!--        <form action="proses/ac_todo_action.php" method="post">-->
			<form>
            <input type="hidden" name="act" value="update">
            <input type="hidden" name="id" value="<?= $data_set['id']; ?>">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-sm">
                        <tr>
                            <td>Karyawan</td>
                            <td>
                                <select class="form-control form-control-sm" name="karyawan_id">
                                    <?php
                                    $get_karyawan = $db->query("SELECT * FROM karyawan");
                                    foreach ($get_karyawan->fetchAll() as $val) {
                                    ?>
                                        <option value="<?= $val['id']; ?>" <?= $val['id'] == $data_set['karyawan_id'] ? "selected" : ""; ?>><?= $val['nama']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>
                                <input required type="text" class="form-control form-control-sm tanggal" name="tanggal" value="<?= $data_set['tanggal']; ?>" placeholder="format : yyyy-mm-dd">
                            </td>
                        </tr>
                        <tr>
                            <td>Cabang</td>
                            <td>
                                <input required type="text" class="form-control form-control-sm" name="cabang" placeholder="contoh: medan" value="<?= $data_set['cabang']; ?>">
                            </td>
                        </tr>                        
                    </table>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>Waktu</th>
                                <th>Kegiatan</th>
                                <th>Status</th>
<!--                                <th>X</th>-->
                            </tr>
                        </thead>
                        <tbody id="list-detail">
                            <?php
                            $get_detail = $db->query("SELECT * FROM detail_todo WHERE todo_id=" . $data_set['id']);
                            $data_set_detail = $get_detail->fetchAll();
                            foreach ($data_set_detail as $val) {
                            ?>
                                <tr>
                                    <td width='15%'><input required type='text' class='form-control form-control-sm' name='waktu[]' placeholder='HH:mm' value='<?=$val['waktu'];?>'></td>
                                    <td><input required type='text' class='form-control form-control-sm' name='kegiatan[]' placeholder='kegiatan yang dilakukan' value='<?=$val['kegiatan'];?>'></td>
                                    <td width='8%'><input required type='text' class='form-control form-control-sm' name='status[]' placeholder='status kegiatan' value='<?=$val['status']?>'></td>
<!--                                    <td width='6%' class='text-center'><button type='button' class='btn btn-sm btn-danger delDetail'>X</button></td>-->
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="?pages=am_viewtodo" class="btn btn-sm btn-dark">Kembali</a>
<!--            <button type="submit" class="btn btn-success btn-sm">Simpan</button>-->
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $(".tanggal").datepicker({
                format: "yyyy-mm-dd"
            });
        });

        $(".btnAddDetail").click(function() {
            var lst = "";

            lst += "<tr>";
            lst += "<td width='15%'><input required type='text' class='form-control form-control-sm' name='waktu[]' placeholder='HH:mm'></td>";
            lst += "<td><input required type='text' class='form-control form-control-sm' name='kegiatan[]' placeholder='kegiatan yang dilakukan'></td>";
            lst += "<td width='8%'><input required type='text' class='form-control form-control-sm' name='status[]' placeholder='status kegiatan'></td>";
//            lst += "<td width='6%' class='text-center'><button type='button' class='btn btn-sm btn-danger delDetail'>X</button></td>";
            lst += "</tr>";

            $("#list-detail").append(lst);
        });

//        $(document).on("click", ".delDetail", function() {
//            $(this).parents("tr").remove();
//        });
    </script>