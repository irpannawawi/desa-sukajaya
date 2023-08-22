<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition">
<?php $this->load->view($_view); ?>

<!-- jQuery -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/AdminLTE/')?>plugins/toastr/toastr.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/AdminLTE/')?>dist/js/adminlte.min.js"></script>

<?php if(!empty($_SESSION['success'])): ?>
  <script>
  toastr.success("<?=$_SESSION['success']?>")  
  </script>
<?php endif ?>


<?php if(!empty($_SESSION['error'])): ?>
  <script>
  toastr.error("<?=$_SESSION['error']?>")  
  </script>
<?php endif ?>
</body>
</html>
