<?php

function checklog()
{
    $CI = &get_instance();
    $level = $CI->session->userdata('level');
    if (!empty($level)) {
        redirect('dashboard');
    }
}

function checklogin()
{
    $CI = &get_instance();
    $level = $CI->session->userdata('level');
    if (empty($level)) {
        redirect('auth/login');
    }
}

function indo_currency($nominal)
{
    return $result = "Rp " . number_format($nominal, 2, ',', '.');
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '/' . $m . '/' . $y;
}

function flashData()
{
?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <script script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <body></body>
<?php
}

function tampil_hapus($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Success',
            showConfirmButton: false,
            timer: 1500,
            title: 'Data Berhasil Dihapus'
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}

function tampil_edit($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Success',
            showConfirmButton: false,
            title: 'Data Berhasil Diedit',
            timer: 1500
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}

function tampil_simpan($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Success',
            title: 'Data Berhasil Disimpan',
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}

function tampil_error($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Error',
            showConfirmButton: false,
            timer: 1500,
            title: 'Data tidak ditemukan'
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}

function tampil_sama($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Error',
            showConfirmButton: false,
            timer: 1500,
            title: 'kode product sudah diinput'
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}

function tampil_melebihi_stok($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Tidak bisa dilakukan',
            showConfirmButton: false,
            timer: 1500,
            title: 'Melebihi Stok yang ada'
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}


function print_data()
{
?>
    <script>
        window.addEventListener("load", window.print());
    </script>
<?php
}

function footerku()
{
?>
    <footer class="main-footer text-left">
        <strong>Copyright &copy; <?= date('Y') ?> <a href="https://fb.me/anwar.xyz" target="_blank">Saepul Anwar</a>.</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0-Beta
        </div>
    </footer>
<?php
}
