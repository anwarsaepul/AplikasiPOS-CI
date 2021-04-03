<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <ol class="float-sm-right">
                    <a href="<?= base_url('sale') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Data
                    </a>
                </ol>
                <h3><i class="nav-icon fas fa-file-alt"></i> Report Penjualan</h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <form action="<?= base_url('report_penjualan/del') ?>" method="POST">
                <table class="table table-sm table-bordered border text-center table-striped" id="table1">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>No Invoice</th>
                            <th>Tanggal</th>
                            <th>Nama Customer</th>
                            <th>Total Belanja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td style="width: 5%;"><?= $no++ ?>.</td>
                                <td>
                                    <?= $data->invoice ?>
                                    <input type="hidden" name="invoice" value="<?= $data->invoice ?>">
                                </td>
                                <td><?= indo_date($data->date) ?></td>
                                <td><?= $data->nama_customer ?></td>
                                <td><?= indo_currency($data->total_harga) ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('report/penjualan/harian/detail/' . $data->sale_id) ?>" class="btn btn-default btn-xs">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    <a href="<?= base_url('report/penjualan/harian/del/' . $data->sale_id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</section>