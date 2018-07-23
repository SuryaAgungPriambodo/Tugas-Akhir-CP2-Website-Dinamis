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

<div class="panel panel-primary">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">

				<form method="POST" onsubmit ="return validasi(this)" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" name = "nama"/>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input class="form-control" name = "username"/>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input class="form-control" name = "password" type="password" />
					</div>

					<div class="form-group">
						<label>Level</label>
						<select class="form-control" name = "level">
							<option value = "Admin">Admin</option>
							<option value = "User">User</option>
						</select>
					</div>

					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="foto">
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
$upload = move_uploaded_file($lokasi, "images/".$foto);

if ($upload) {

		$sql = $koneksi -> query ("insert into tb_user (nama, username, password, level, foto) values('$nama','$username','$password','$level','$foto')");

		if ($sql) {
			?>

			<script type = "text/javascript">
				alert ("Data Berhasil Disimpan");
				window.location.href="?page=user";
			</script>
			<?php
		}
	}

}
?>