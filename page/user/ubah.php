<script type="text/javascript">
	function validasi(form){
		if (form.nama.value==""){
			alert("Nama Tidak Boleh Kosong");
			form.nama.focus();
			return(false);
		}if (form.username.value==""){
			alert("Username Tidak Boleh Kosong");
			form.username.focus();
			return(false);
		}if (form.password.value==""){
			alert("Password Tidak Boleh Kosong");
			form.password.focus();
			return(false);
		}if (form.level.value==""){
			alert("Level Tidak Boleh Kosong");
			form.level.focus();
			return(false);
		}if (form.foto.value==""){
			alert("Foto Tidak Boleh Kosong");
			form.foto.focus();
			return(false);
		}
		return(true);

	}
</script>

<?php

$id = $_GET['id'];

$sql = $koneksi -> query ("select * from tb_user where id='$id'");

$tampil = $sql -> fetch_assoc();

$level = $tampil['level'];

?>

<div class="panel panel-primary">
	<div class="panel-heading">
		Ubah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">

				<form method="POST" onsubmit ="return validasi(this)" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" name = "nama" value = "<?php echo $tampil['nama'];?>"/>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input class="form-control" name = "username" value = "<?php echo $tampil['username'];?>"/>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input class="form-control" name = "password" value = "<?php echo $tampil['password'];?>"/>
					</div>

					<div class="form-group">
						<label>Level</label>
						<select class="form-control" name = "level">
							<option value = "Admin" <?php if ($level=='Admin'){echo "selected";}?>>Admin</option>
							<option value = "User" <?php if ($level=='User'){echo "selected";}?>>User</option>
						</select>
					</div>

					<label>Foto</label>
					<div class="form-group">
						<img src = "images/<?php echo $tampil['foto'];?>" width = "100" height = "100" alt = ""/>
					</div>

					<div class="form-group">
						<label>Ganti Foto</label>
						<input type="file" name="foto" />
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

if (isset($_POST['simpan'])) {

	$nama = $_POST ['nama'];
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	$level = $_POST ['level'];
	$foto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];

	if (!empty($lokasi)) {

		$upload = move_uploaded_file($lokasi, "images/".$foto);

		$sql = $koneksi -> query ("update tb_user set nama='$nama', username='$username', password='$password', level='$level', foto='$foto' where id='$id'");

		if ($sql) {
			?>

			<script type = "text/javascript">
				alert ("Ubah Data Berhasil Disimpan");
				window.location.href="?page=user";
			</script>
			<?php
		}

	}else{

		$sql = $koneksi -> query ("update tb_user set nama='$nama', username='$username', password='$password', level='$level' where id='$id'");

		if ($sql) {
			?>

			<script type = "text/javascript">
				alert ("Ubah Data Berhasil Disimpan");
				window.location.href="?page=user";
			</script>
			<?php
		}
	}
}

?>