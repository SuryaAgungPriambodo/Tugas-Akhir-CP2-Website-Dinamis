<?php

$nim = $_GET['id'];

$sql = $koneksi -> query ("select * from tb_anggota where nim='$nim'");

$tampil = $sql -> fetch_assoc();

$jkl = $tampil['jk'];

$prodi = $tampil['prodi'];

?>

<div class="panel panel-default">
	<div class="panel-heading">
		Ubah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">

				<form method="POST">
					<div class="form-group">
						<label>NIM</label>
						<input class="form-control" name = "nim" value = "<?php echo $tampil['nim'];?>" readonly />
					</div>

					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" name = "nama" value = "<?php echo $tampil['nama'];?>"/>
					</div>

					<div class="form-group">
						<label>Tempat Lahir</label>
						<input class="form-control" name = "tempat_lahir" value = "<?php echo $tampil['tempat_lahir'];?>"/>
					</div>

					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input class="form-control" type = "date" name = "tgl_lahir" value = "<?php echo $tampil['tgl_lahir'];?>"/>
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label>
						<label class="checkbox-inline">
							<input type="radio" value = "l" name ="but" <?php echo($jkl==l)?"checked":"";?>/> Laki-Laki
						</label>
						<label class="checkbox-inline">
							<input type="radio" value = "p" name ="but" <?php echo($jkl==p)?"checked":"";?>/> Perempuan
						</label>
					</div>

					<div class="form-group">
						<label>Tahun Terbit</label>
						<select class="form-control" name = "prodi">
							<option value = "Teknik Informatika" <?php if ($prodi=='Teknik Informatika'){echo "selected";}?>>Teknik Informatika</option>
							<option value = "Sistem Informasi" <?php if ($prodi=='Sistem Informasi'){echo "selected";}?>>Sistem Informasi</option>
							<option value = "Sistem Komputer" <?php if ($prodi=='Sistem Komputer'){echo "selected";}?>>Sistem Komputer</option>
						</select>
					</div>

					<div>
						<input type = "submit" name="simpan" value = "Simpan" class="btn - btn-primary">
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<?php

$nim = $_POST ['nim'];
$nama = $_POST ['nama'];
$tempat_lahir = $_POST ['tempat_lahir'];
$tgl_lahir = $_POST ['tgl_lahir'];
$jk = $_POST ['jk'];
$prodi = $_POST ['prodi'];

$simpan = $_POST ['simpan'];

if ($simpan) {

	$sql = $koneksi -> query ("update tb_anggota set nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jk='$jk', prodi='$prodi' where nim='$nim'");

	if ($sql) {
		?>

		<script type = "text/javascript">
			alert ("Ubah Data Berhasil Disimpan");
			window.location.href="?page=anggota";
		</script>
		<?php

	}
}

?>