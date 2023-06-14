<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
    <?php

    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('pesan');
        echo '</h5></div>';
    }
    ?>
</div>
<div class="col-sm-4">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Logo</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo form_open_multipart('admin/saveSetting') ?>
            <div class="text-center">
                <img class="img-fluid pad" id="gambar_load" src="<?= base_url('logo/' . $setting['logo']) ?>" width="250px" height="250px">
            </div>
            <div class="form-group">
                <label>Ganti Logo</label>
                <input name="logo" type="file" id="preview_gambar" class="form-control" accept="image/*">
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="col-sm-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Sekolah</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input name="nama_sekolah" value="<?= $setting['nama_sekolah'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input name="no_telpon" value="<?= $setting['no_telpon'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input name="email" value="<?= $setting['email'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Web</label>
                        <input name="web" value="<?= $setting['web'] ?>" class="form-control">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat Sekolah</label>
                        <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input name="kecamatan" value="<?= $setting['kecamatan'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kabupaten/Kota</label>
                        <input name="kabupaten" value="<?= $setting['kabupaten'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input name="provinsi" value="<?= $setting['provinsi'] ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="col-sm-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Deskripsi Sekolah</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <textarea name="deskripsi" rows="5" class="form-control"><?= $setting['deskripsi'] ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-flat btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<?php echo form_close() ?>
<?= $this->endSection() ?>