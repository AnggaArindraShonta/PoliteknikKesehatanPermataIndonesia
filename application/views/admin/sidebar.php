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
        <p> <?php echo $nama_admin;  ?> </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>

      <li <?php if ("/pkpi/admin" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      <li <?php if ("/pkpi/admin/member" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin/member">
          <i class="fa fa-users"></i> <span>Dosen</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>