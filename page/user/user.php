<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data Pengguna
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $no =1;
                            
                            $sql = $koneksi->query("select * from tb_user");

                            while ($data = $sql->fetch_assoc()){
                                ?>

                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $data['nama'];?></td>
                                    <td><?php echo $data['username'];?></td>
                                    <td><?php echo $data['password'];?></td>
                                    <td><?php echo $data['level'];?></td>
                                    <td><img src="images/<?php echo $data['foto'];?>" width = "50" height = "50" alt = ""></td>
                                    <td>
                                        <a href = "?page=user&aksi=ubah&id=<?php echo $data['id'];?>" class = "btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
                                        <a onclick = "return confirm('Anda Yakin Ingin Menghapus Data Ini ?')"href = "?page=user&aksi=hapus&id=<?php echo $data['id'];?>" class = "btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>

                            <?php }?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href ="?page=user&aksi=tambah" class = "btn btn-success" style = "margin-bottom:5px;"><i class = "fa fa-plus"></i> Tambah Data</a>
    </div>
</div>