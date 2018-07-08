<a href ="?page=transaksi&aksi=tambah" class = "btn btn-success" style = "margin-bottom:5px;"><i class = "fa fa-plus"></i> Tambah Data</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data Transaksi
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Terlambat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $no =1;

                            $sql = $koneksi->query("select * from tb_transaksi where status = 'pinjam'");

                            while ($data = $sql->fetch_assoc()){

                                $status = ($data['status']==pinjam)?"Pinjam":"Kembali";

                                ?>

                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $data['judul'];?></td>
                                    <td><?php echo $data['nim'];?></td>
                                    <td><?php echo $data['nama'];?></td>
                                    <td><?php echo $data['tgl_pinjam'];?></td>
                                    <td><?php echo $data['tgl_kembali'];?></td>
                                    <td>

                                        <?php 

                                        $denda = 1000;

                                        $tgl_dateline = $data['tgl_kembali'];
                                        $tgl_kembali = date('Y-m-d');

                                        $lambat = terlambat($tgl_dateline, $tgl_kembali);
                                        $denda1 = $lambat*$denda;

                                        if ($lambat>0) {
                                            echo "
                                            <font color='red'>$lambat Hari<br>(Rp. $denda1)</font>
                                            ";

                                        }else{
                                            echo $lambat." Hari";
                                        }

                                        ?>

                                    </td>
                                    <td><?php echo $status;?></td>
                                    <td>
                                        <a href = "?page=anggota&aksi=ubah&id=<?php echo $data['nim'];?>" class = "btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
                                        <a onclick = "return confirm('Anda Yakin Ingin Menghapus Data Ini ?')"href = "?page=anggota&aksi=hapus&id=<?php echo $data['nim'];?>" class = "btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>

                            <?php }?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>