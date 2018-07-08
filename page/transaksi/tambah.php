<?php

$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("d-m-Y", $tujuh_hari);

?>

<div class="panel panel-primary">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">

				<form method="POST">
					<div class="form-group">
						<label>Buku</label>
						<select class="form-control" name = "buku"/>
						<?php

						$sql = $koneksi->query("select * from tb_buku order by id");
						while ($data=$sql->fetch_assoc()){
							echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
						}

						?>
					</select>
				</div>

				<div class="form-group">
					<label>Nama</label>
					<select class="form-control" name = "nama"/>
					<?php

					$sql = $koneksi->query("select * from tb_anggota order by nim");
					while ($data=$sql->fetch_assoc()){
						echo "<option value='$data[nim].$data[nama]'>$data[nim].$data[nama]</option>";
					}

					?>
				</select>
			</div>

			<div class="form-group">
				<label>Tanggal Pinjam</label>
				<input class="form-control" type="text" name = "tgl_pinjam" id="tgl" value="<?php echo $tgl_pinjam;?>" readonly />
			</div>

			<div class="form-group">
				<label>Tanggal Kembali</label>
				<input class="form-control" type="text" name = "tgl_kembali" id="tgl" value="<?php echo $kembali;?>" readonly />
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