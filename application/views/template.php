<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My POS by Zona Programming</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= ucfirst($this->session_id->user_login()->nama_lengkap) ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-1">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('supplier') ?>" class="nav-link <?= $this->uri->segment(1) == 'supplier' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-truck"></i>
                <p>Supplier</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('customer') ?>" class="nav-link <?= $this->uri->segment(1) == 'customer' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-users"></i>
                <p>Customers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link 
              <?= $this->uri->segment(1) == 'category' ||
                $this->uri->segment(1) == 'unit' ||
                $this->uri->segment(1) == 'item' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-archive"></i>
                <p>
                  Products
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('category') ?>" class="nav-link <?= $this->uri->segment(1) == 'category' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('unit') ?>" class="nav-link <?= $this->uri->segment(1) == 'unit' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Units</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('item') ?>" class="nav-link <?= $this->uri->segment(1) == 'item' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Items</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link 
              <?= $this->uri->segment(1) == 'stock' ||
                $this->uri->segment(1) == 'stock/in' ||
                $this->uri->segment(1) == 'stock/out' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Transaction
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('stock/in') ?>" class="nav-link <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in'  ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stock In</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('stock/out') ?>" class="nav-link <?= $this->uri->segment(1) == 'unit' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stok Out</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?= $contents ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Saepul Anwar</a>.</strong> All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0-rc
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
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#table1').DataTable({
        "lengthChange": false
      });

      $(document).on('click', '#select', function() {
        let item_id = $(this).data('id');
        let kodebarang = $(this).data('kodebarang');
        let nama_item = $(this).data('nama_item');
        let nama_unit = $(this).data('nama_unit');
        let stock = $(this).data('stock');

        $('#item_id').val(item_id);
        $('#kodebarang').val(kodebarang);
        $('#nama_item').val(nama_item);
        $('#nama_unit').val(nama_unit);
        $('#stock').val(stock);
      });

      $(document).on('click', '#set_detail', function() {
        let kodeproduct = $(this).data('kodeproduct');
        let nama_item = $(this).data('nama_item');
        let nama_supplier = $(this).data('nama_supplier');
        let qty = $(this).data('qty');
        let detail = $(this).data('detail');
        let price = $(this).data('price');
        let date = $(this).data('date');
        // alert(nama_supplier);

        $('#kodeproduct').text(kodeproduct);
        $('#nama_item').text(nama_item);
        $('#nama_supplier').text(nama_supplier);
        $('#qty').text(qty);
        $('#detail').text(detail);
        $('#price').text(price);
        $('#date').text(date);
        
      });
    });
  </script>
</body>

</html>