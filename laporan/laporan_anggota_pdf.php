<?php
$koneksi = new mysqli("localhost","root","","db_perpustakaan");
$content = '
<style type = "text/css">
.tabel{border-collapse: collapse;}
.tabel th{padding: 8px 5px; background-color: #cccccc;}
.tabel td{padding: 8px 5px;}
</style>
';

$content .= '

<page>
<h2>Laporan Data Anggota</h2>

<table border="1" class="tabel">

<tr>
<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Jenis Kelamin</th>
<th>Prodi</th>
</tr>';

$no = 1;

$sql = $koneksi->query("select * from tb_anggota");

while ($data = $sql->fetch_assoc()){

	$jk = ($data['jk']=='l')?"Laki-Laki":"Perempuan";

	$content .='

	<tr>
	<td>'.$no++.'</td>
	<td>'.$data['nim'].'</td>
	<td>'.$data['nama'].'</td>
	<td>'.$data['tempat_lahir'].'</td>
	<td>'.$data['tgl_lahir'].'</td>
	<td>'.$jk.'</td>
	<td>'.$data['prodi'].'</td>
	</tr>
	';
}
$content .='

</table>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Laporan.pdf')

?>