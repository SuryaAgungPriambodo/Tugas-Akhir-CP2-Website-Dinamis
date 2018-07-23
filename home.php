<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-6">           
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="fa fa-users"></i>
            </span>
            <div class="text-box" >
                <?php $result = mysqli_query($konek, "select * from tb_anggota order by nim");
                $total=mysqli_num_rows($result);
                ?>

                <p class="main-text"><?php echo "$total"; ?> Orang</p>
                <p></p>
                <p class="main-text">Total Anggota</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-6">           
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue set-icon">
                <i class="fa fa-book"></i>
            </span>
            <div class="text-box" >
                <?php $result = mysqli_query($konek, "select * from tb_buku order by id");
                $total=mysqli_num_rows($result);
                ?>

                <p class="main-text"><?php echo "$total"; ?> Buku</p>
                <p></p>
                <p class="main-text">Total Judul Buku</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-6">           
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-green set-icon">
                <i class="fa fa-users"></i>
            </span>
            <div class="text-box" >
                <?php $result = mysqli_query($konek, "select * from tb_transaksi  where status = 'pinjam'
                    order by status");
                $total=mysqli_num_rows($result);
                ?>

                <p class="main-text"><?php echo "$total"; ?> Orang</p>
                <p></p>
                <p class="main-text">Total Peminjam</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-back noti-box">
            <!--earning graph start-->
            <section class="panel">
                <header class="panel-heading">
                    <p class="main-text">GRAFIK PEMINJAMAN BUKU TAHUN 2018</p>
                </header>
                <div class="panel-body">
                    <canvas id="linechart" width="600" height="330"></canvas>
                </div>
            </section>
        </div>
        <!--earning graph end-->
    </div>
    <div class="col-md-4">
<section class="panel panel-back noti-box">
    <header class="panel-heading">
        Log Pemberitahuan
    </header>
    <div class="panel-body" id="noti-box">
        <?php
        $tampil=mysqli_query($konek, "select * from tb_anggota order by nim desc limit 1");
        while($data2=mysqli_fetch_array($tampil)){
            ?>
            <div class="alert alert-block alert-danger">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong><?php echo $data2['nama'];?></strong> telah terdaftar menjadi anggota baru perpustakaan.
            </div>
        <?php } ?>

        <?php
        $tampil=mysqli_query($konek, "select * from tb_buku order by id desc limit 1");
        while($data3=mysqli_fetch_array($tampil)){
            ?>
            <div class="alert alert-success">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                Buku berjudul <strong><?php echo $data3['judul']; ?></strong> baru saja ditambahkan ke daftar buku baru. 
            </div>
        <?php } ?>

        <?php
        $tampil=mysqli_query($konek, "select * from tb_transaksi order by id desc limit 1");
        while($data4=mysqli_fetch_array($tampil)){
            ?>
            <div class="alert alert-info">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong><?php echo $data4['nama']; ?></strong> baru saja meminjam buku baru dengan judul <strong><?php echo $data4['judul']; ?></strong>. 
            </div>
        <?php } ?>

        <?php
        $tampil=mysqli_query($konek, "select * from tb_transaksi where status = 'kembali' order by id desc limit 1 ");
        while($data4=mysqli_fetch_array($tampil)){
            ?>
            <div class="alert alert-warning">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong><?php echo $data4['nama']; ?></strong> baru saja mengembalikan buku dengan judul <strong><?php echo $data4['judul']; ?></strong>. 
            </div>
        <?php } ?>

    </div>
</section>
</div>
</div>
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="assets/js/jquery.min.js" type="text/javascript"></script>

<!-- jQuery UI 1.10.3 -->
<script src="assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

<script src="assets/js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
            <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
            <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
            <!-- iCheck -->
            <script src="assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
            <!-- calendar -->
            <script src="assets/js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

            <!-- Director App -->
            <script src="assets/js/Director/app.js" type="text/javascript"></script>

            <!-- Director dashboard demo (This is only for demo purposes) -->
            <script src="assets/js/Director/dashboard.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(function() {
                    "use strict";
                //BAR CHART
                var data = {
                    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus","September","Oktober","November","Desember"],
                    datasets: [
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 5]
                    }
                    ]
                };
                new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                    responsive : true,
                    maintainAspectRatio: true,
                });

            });
            // Chart.defaults.global.responsive = true;
        </script>
