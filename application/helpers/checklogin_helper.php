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
            title: 'Data Berhasil Diedit'
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
            title: 'Data Berhasil Disimpan'
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
            title: 'kode product sudah diinput'
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}