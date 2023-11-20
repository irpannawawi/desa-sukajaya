<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIP MASYARAKAT</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <h2>Sistem Informasi Pelayanan Masyarakat</h2>
  </div>

  <!-- Navbar -->
<?php
    $this->load->view('templates/topbar'); 
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    $this->load->view('templates/sidebar'); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
    if(isset($_view)) $this->load->view($_view);
    ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?=date('Y')?> Pemerintah Desa Sukajaya</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?=base_url('assets/AdminLTE/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?=base_url('assets/AdminLTE/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/AdminLTE/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/AdminLTE/')?>dist/js/adminlte.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  $('.datatable').dataTable()
</script>
</body>
</html>
