    <div class="container">
        <h4><b>Rencana dan Realisasi Anggaran Kas(RRAK)</b></h4>
        <form action="proses/todo_form.php" method="post">
            <input type="hidden" name="act" value="add">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-sm">
                        <tr>
                            <td>Karyawan</td>
                            <td>
                                <select class="form-control form-control-sm" name="karyawan_id">
                                    <?php
                                        require_once "db/db.php";
                                        $get_karyawan = $db->query("SELECT * FROM karyawan");
                                        foreach ($get_karyawan->fetchAll() as $val){
                                            ?>
                                                <option value="<?=$val['id'];?>"><?=$val['nama'];?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
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
                    </table>

                </div>
            </div>
			<td></td>
            <hr />
			
<div class="container">
            
               <div class="table-responsive-md">
				  <table class="table border">
					<thead>
						<tr class="bg-info">
							<td width="1%"><b>NO</b></td>
						    <td width="40%"><b>DESKRIPSI</b></td>
							<td width="10%"><b>REALISASI BULAN LALU (Qty)</b></td>
							<td width="20%"><b>REALISASI BULAN LALU (Rp)</b></td>
							<td width="20%"><b>RENCANA (Qty)</b></td>
							<td width="20%"><b>RENCANA (Rp)(1)</b></td>
							<td width="20%"><b>REALISASI (Rp)(2)</b></td>
							<td width="20%"><b>SELISIH (Rp)(1-2)</b></td>
						</tr>
					</thead>
					<tbody>
						<?php
							$get_data = $db->query("SELECT * FROM tipe_kebutuhan");
							foreach ($get_data->fetchAll() as $key => $val) {
								$get_kebutuhan = $db->query("SELECT * FROM kebutuhan WHERE tipe_kebutuhan=" . $val['id']);
								?>
									<tr class="bg-dark text-white">
										<td colspan="8">
											<?= $val['nama_tipe']; ?>
										</td>
									</tr>
								<?php
								$detail_num = 1;
								foreach ($get_kebutuhan->fetchAll() as $item => $detail) {
									?>
										<tr>
											<td><?=$detail_num++;?></td>
											<td>
												<?= $detail['deskripsi']; ?>
												<input type="hidden" name="kebutuhan_id[]" value="<?=$detail['id'];?>">
											</td>
											<td>
												<input type="number" name="realisasi_bulan_lalu_qty[]" class="form-control form-control-sm">
											</td>
											<td>
												<input type="number" name="realisasi_bulan_lalu_biaya[]" class="form-control form-control-sm">
											</td>
											<td>
												<input type="number" name="rencana_qty[]" class="form-control form-control-sm">
											</td>
											<td>
												<input type="number" name="rencana_biaya[]" class="form-control form-control-sm">
											</td>
											<td>
												<input type="number" name="realisasi_biaya[]" class="form-control form-control-sm">
											</td>
											<td>
												<input type="number" name="selisih_biaya[]" class="form-control form-control-sm">
											</td>
										</tr>
									<?php
								}	
							}
						?>
					</tbody>
				  
				  </table>

			   </div>
            
</div>
		
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
			  </div>
			  <div class="custom-file">
				<input type="file" class="custom-file-input" id="inputGroupFile01" name="File" aria-describedby="inputGroupFileAddon01">
				<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
			  </div>
			</div>
			
			
        </form>
    </div>
<div class="container">
<a href="?pages=menuactivity" class="btn btn-outline-danger float-left">KEMBALI</a>			
<button type="reset" class="btn btn-warning btn-md">BATAL</button>
<button type="submit" class="btn btn-success btn-md float-right">SIMPAN</button>
</div>


<!--INPUT TANGGAL OTOMATIS-->
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
                lst += "<td width='8%'><input required type='text' class='form-control form-control-sm' name='status[]' placeholder='status kegiatan'></td>";
                lst += "<td width='6%' class='text-center'><button type='button' class='btn btn-sm btn-danger delDetail'>X</button></td>";
            lst += "</tr>";

            $("#list-detail").append(lst);
        });

        $(document).on("click", ".delDetail", function(){
            $(this).parents("tr").remove();
        });
    </script>
