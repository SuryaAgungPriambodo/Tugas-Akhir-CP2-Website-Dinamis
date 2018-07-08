<script type="text/javascript">
	function validasi(form){
		if (form.nim.value==""){
			alert("NIM Tidak Boleh Kosong");
			form.nim.focus();
			return(false);
		}if (form.nama.value==""){
			alert("Nama Tidak Boleh Kosong");
			form.nama.focus();
			return(false);
		}if (form.tempat_lahir.value==""){
			alert("Tempat Lahir Tidak Boleh Kosong");
			form.tempat_lahir.focus();
			return(false);
		}if (form.tgl_lahir.value==""){
			alert("Tanggal Lahir Tidak Boleh Kosong");
			form.tgl_lahir.focus();
			return(false);
		}
		return(true);

	}
</script>

<script type="text/javascript">
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

			return false;
		return true;
	}
</script>

<div class="panel panel-primary">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">

				<form method="POST" onsubmit ="return validasi(this)">
					<div class="form-group">
						<label>NIM</label>
						<input class="form-control" name = "nim" maxlength="8" onkeypress="return hanyaAngka(event)"/>
					</div>

					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" name = "nama"/>
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label>
						<label class="checkbox-inline">
							<input type="radio" value = "l" name ="jk" checked="checked"/> Laki-Laki
						</label>
						<label class="checkbox-inline">
							<input type="radio" value = "p" name ="jk"/> Perempuan
						</label>
					</div>

					<div class="form-group">
						<label>Tempat Lahir</label>
						<input class="form-control" name = "tempat_lahir"/>
					</div>

					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input class="form-control" type = "date" name = "tgl_lahir"/>
					</div>

					<div class="form-group">
						<label>Tahun Terbit</label>
						<select class="form-control" name = "prodi">
							<option value = "Teknik Informatika">Teknik Informatika</option>
							<option value = "Sistem Informasi">Sistem Informasi</option>
							<option value = "Sistem Komputer">Sistem Komputer</option>
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

	$sql = $koneksi -> query ("insert into tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jk, prodi) values('$nim','$nama','$tempat_lahir','$tgl_lahir','$jk','$prodi')");

	if ($sql) {
		?>

		<script type = "text/javascript">
			alert ("Data Berhasil Disimpan");
			window.location.href="?page=anggota";
		</script>
		<?php

	}
}

?>