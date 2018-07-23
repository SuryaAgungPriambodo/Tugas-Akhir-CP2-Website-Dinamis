<?php

	$id = $_GET ['id'];

	$koneksi -> query ("delete from tb_user where id = '$id'");

?>

<script type = "text/javascript">
	window.location.href="?page=user";
</script>