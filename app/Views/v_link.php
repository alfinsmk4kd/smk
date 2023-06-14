<?php
  $db = \Config\Database::connect();
  $setting = $db->table('tbl_setting')->where('id','1')->get()->getRowArray();
  $ta = $db->table('tbl_ta')->where('status','1')->get()->getRowArray();
?>
<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>
    <div class="col-sm-4">
    <img src="<?= base_url('logo/link.png') ?>" alt="Register" class="img-fluid pad img-circle" width="160px">
   </div>
   <div class="col-sm-7">
   <div class="card card-outline card-primary">
        <div class="card-header">
        <h3 class="card-title"><b>Halaman Login PPDB SMKN 4 Kendari</b></h3><br>
        </div>
        <div class="card-body">
        
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
            <a href="<?= base_url('auth/login') ?>" class="btn btn-primary btn-flat btn-block"><i class="fas fa-user"></i> Admin</a>
            </div>
            <div class="col-sm-6">
            <a href="<?= base_url('auth/loginsiswa') ?>" class="btn btn-success btn-flat btn-block"><i class="fas fa-users"></i> Siswa</a>
            </div>
          </div>
        </div>
    </div>
   </div>

<?= $this->endSection() ?>