<?php

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() ?>assets/img/admin_icon.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p> <?php echo $nama_member;  ?> </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>

      <li <?php if ("/pkpi/dosen" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>dosen">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      <li <?php if ("/pkpi/dosen/krs" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>dosen/krs">
          <i class="fa fa-clipboard"></i> <span>Bimbingan KRS</span>
        </a>
      </li>
      <li <?php if ("/pkpi/dosen/uts" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>dosen/uts">
          <i class="fa fa-clipboard"></i> <span>Bimbingan UTS</span>
        </a>
      </li>
      <li <?php if ("/pkpi/dosen/uas" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>dosen/uas">
          <i class="fa fa-clipboard"></i> <span>Bimbingan UAS</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>