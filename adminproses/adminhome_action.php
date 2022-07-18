	<?php
	require_once "../db/db.php"; 

	if (isset($_POST['insert']))
	{
		
		#tambahin validasi disini
		$query_cek = $db->query("SELECT nik FROM karyawan WHERE nik=".$_POST['nik']);
		if ($query_cek->rowCount() > 0) {
	?>
				<script type="text/javascript">
					alert("NIK Already Registered");
					window.location.href=('../adminhome.php');
				</script>
		<?php
		} else {
			$nik=$_POST['nik'];
			$nama=$_POST['nama'];
			$jabatan=$_POST['jabatan'];
			$cabang=$_POST['cabang'];
		
			$images=$_FILES['File']['name'];
			$tmp_dir=$_FILES['File']['tmp_name'];
			$imageSize=$_FILES['File']['size'];
			$upload_dir='../uploadFoto/';
			$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
			$valid_extensions=array('jpeg','jpg','png','svg');
			$foto=rand(1000, 1000000).".".$imgExt;
			move_uploaded_file($tmp_dir, $upload_dir.$foto);
			
			$sql ='INSERT INTO karyawan(nik, nama, jabatan, cabang, foto) VALUES (:nik, :nama, :jabatan, :cabang, :foto)';
			$stmt=$db->prepare($sql);
			
			$stmt->bindParam(':nik', $nik);
			$stmt->bindParam(':nama', $nama);
			$stmt->bindParam(':jabatan', $jabatan);
			$stmt->bindParam(':cabang', $cabang);
			$stmt->bindParam(':foto', $foto);
			if($stmt->execute())
			{
		?>
					<script type="text/javascript">
						alert("BERHASIL DI SIMPAN");
						window.location.href=('../adminhome.php');
					</script>
				<?php
			}else{
				?>
					<script type="text/javascript">
						alert("error");
						window.location.href=('../adminhome.php');
					</script>
				<?php
			}	
		}
		
	}
	?>
