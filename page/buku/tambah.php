<script type="text/javascript">
	function validasi(form){
		if (form.judul.value==""){
			alert("Judul Tidak Boleh Kosong");
			form.judul.focus();
			return(false);
		}if (form.pengarang.value==""){
			alert("Pengarang Tidak Boleh Kosong");
			form.pengarang.focus();
			return(false);
		}if (form.penerbit.value==""){
			alert("Penerbit Tidak Boleh Kosong");
			form.penerbit.focus();
			return(false);
		}if (form.tahun.value==""){
			alert("Tahun Terbit Tidak Boleh Kosong");
			form.tahun.focus();
			return(false);
		}if (form.isbn.value==""){
			alert("ISBN Tidak Boleh Kosong");
			form.isbn.focus();
			return(false);
		}if (form.jumlah.value==""){
			alert("Jumlah Buku Tidak Boleh Kosong");
			form.jumlah.focus();
			return(false);
		}if (form.tanggal.value==""){
			alert("Tanggal Input Tidak Boleh Kosong");
			form.tanggal.focus();
			return(false);
		}
		return(true);

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
						<label>Judul</label>
						<input class="form-control" name = "judul"/>
					</div>

					<div class="form-group">
						<label>Pengarang</label>
						<input class="form-control" name = "pengarang"/>
					</div>

					<div class="form-group">
						<label>Penerbit</label>
						<input class="form-control" name = "penerbit"/>
					</div>

					<div class="form-group">
						<label>Tahun Terbit</label>
						<select class="form-control" name = "tahun">
							<?php

							$tahun =date("Y");

							for ($i=$tahun-29; $i <= $tahun; $i++) {
								echo '<option value="'.$i.'">'.$i.'</option>';
							}

							?>
						</select>
					</div>

					<div class="form-group">
						<label>ISBN</label>
						<input class="form-control" name = "isbn"/>
					</div>

					<div class="form-group">
						<label>Jumlah Buku</label>
						<input class="form-control" type = "number" name = "jumlah"/>
					</div>

					<div class="form-group">
						<label>Lokasi</label>
						<select class="form-control" name = "lokasi">
							<option value = "rak1">Rak 1</option>
							<option value = "rak2">Rak 2</option>
							<option value = "rak3">Rak 3</option>
						</select>
					</div>

					<div class="form-group">
						<label>Tanggal Input</label>
						<input class="form-control" type = "date" name = "tanggal"/>
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

$judul = $_POST ['judul'];
$pengarang = $_POST ['pengarang'];
$penerbit = $_POST ['penerbit'];
$tahun = $_POST ['tahun'];
$isbn = $_POST ['isbn'];
$jumlah = $_POST ['jumlah'];
$lokasi = $_POST ['lokasi'];
$tanggal = $_POST ['tanggal'];

$simpan = $_POST ['simpan'];

if ($simpan) {

	$sql = $koneksi -> query ("insert into tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi, tgl_input) values('$judul','$pengarang','$penerbit','$tahun','$isbn','$jumlah','$lokasi','$tanggal')");

	if ($sql) {
		?>

		<script type = "text/javascript">
			alert ("Data Berhasil Disimpan");
			window.location.href="?page=buku";
		</script>
		<?php

	}
}

?>