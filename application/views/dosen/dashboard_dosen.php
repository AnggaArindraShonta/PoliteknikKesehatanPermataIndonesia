  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard Dosen
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dosen/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>

      <?= $this->session->flashdata('message') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $krs; ?></h3>

              <p>Data Bimbingan KRS</p>
            </div>
            <div class="icon">
              <i class="fa fa-clipboard"></i>
            </div>
            <a href="<?php echo base_url() ?>dosen/krs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $uts; ?></h3>

              <p>Data Bimbingan UTS</p>
            </div>
            <div class="icon">
              <i class="fa fa-clipboard"></i>
            </div>
            <a href="<?php echo base_url() ?>dosen/uts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $uas; ?></h3>
              
              <p>Data Bimbingan UAS</p>
            </div>
            <div class="icon">
              <i class="fa fa-clipboard"></i>
            </div>
            <a href="<?php echo base_url() ?>dosen/uas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->