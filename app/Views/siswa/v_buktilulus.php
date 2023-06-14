<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB Online | Bukti Lulus</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-sm-12">
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="3"><img src="<?= base_url('logo/' . $setting['logo']) ?>" width="100px"></th>
                                <th></th>
                                <th rowspan="3"></th>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    <h1><?= $setting['nama_sekolah'] ?></h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5><?= $setting['alamat'] ?></h5>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.col -->
            </div>


            <!-- Table row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h5><b>Surat Keterangan Lulus</b></h5>
                    </div>
                </div>

                <div class="col-sm-12 text-center">
                    <img src="<?= base_url('foto/' . $siswa['foto']) ?>" class="img-circle pad" alt="" width="100px" height="100px">
                </div>

                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200px">NO Pendaftaran</th>
                            <th width="50px">:</th>
                            <th><?= $siswa['no_pendaftaran'] ?></th>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <th>:</th>
                            <td><?= $siswa['nisn'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>:</th>
                            <td><?= $siswa['nama_lengkap'] ?></td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>:</th>
                            <td><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>
                        </tr>
                        <tr>
                            <th>Jalur Masuk</th>
                            <th>:</th>
                            <td><?= $siswa['jalur_masuk'] ?></td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <th>:</th>
                            <td><?= $siswa['jurusan'] ?></td>
                        </tr>
                        <tr>
                            <th>Nilai Rata-rata</th>
                            <th>:</th>
                            <td><?= $siswa['mm'] ?></td>
                        </tr>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>