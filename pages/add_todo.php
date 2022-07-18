    <div class="container mt-4 shadow">
        <h4>Tambah Aktivitas</h4>
        <form action="proses/ac_todo_action.php" method="post">
            <input type="hidden" name="act" value="add">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-sm">
                        <tr>
                            <td>Karyawan</td>
                            <td>
                                <input type="hidden" name="karyawan_id" value="<?=$_SESSION['id_karyawan'];?>" />
                                <?=$_SESSION['nama'];?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>
                                <input value="<?= date("Y-m-d"); ?>" required type="text" class="form-control form-control-sm tanggal" name="tanggal" placeholder="format : yyyy-mm-dd">
                            </td>
                        </tr>
                        <tr>
                            <td>Cabang</td>
                            <td>
                                <input required type="text" class="form-control form-control-sm" name="cabang" placeholder="contoh: medan">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="button" class="btn btn-sm btn-primary btnAddDetail">Tambah Kegiatan</button></td>
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
                                <th>&times;</th>
                            </tr>
                        </thead>
                        <tbody id="list-detail">

                        </tbody>
                    </table>
                </div>
            </div>
			<div class="clearfix">
			  	<a href="?pages=activity" class="btn btn-outline-danger float-left">KEMBALI</a>
            	<button type="submit" class="btn btn-success btn-md float-right">Simpan</button>
			</div>
            
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $(".tanggal").datepicker({
                format: "yyyy-mm-dd"
            });
        });

        $(".btnAddDetail").click(function(){
            var lst = "";

            lst += "<tr>";
                lst += "<td width='15%'><input required type='text' value='<?= date("H:i");?>' class='form-control form-control-sm' name='waktu[]' placeholder='HH:mm'></td>";
                lst += "<td><input required type='text' class='form-control form-control-sm' name='kegiatan[]' placeholder='kegiatan yang dilakukan'></td>";
                lst += "<td width='15%'><input required type='text' class='form-control form-control-sm' name='status[]' placeholder='status kegiatan'></td>";
                lst += "<td width='6%' class='text-center'><button type='button' class='btn btn-sm btn-danger delDetail'>X</button></td>";
            lst += "</tr>";

            $("#list-detail").append(lst);
        });

        $(document).on("click", ".delDetail", function(){
            $(this).parents("tr").remove();
        });
    </script>
