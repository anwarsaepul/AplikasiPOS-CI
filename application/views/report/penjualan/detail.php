<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <h3><i class="nav-icon fa fa-users"></i>Transaksi</h3>
            </div>
            <!-- <div class="row p-2"> -->
            <div class="row p-2 pt-2">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Invoice</span>
                            <span class="info-box-number"><?= $row->invoice ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"> <i class="nav-icon fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Nama Customers</span>
                            <span class="info-box-number"><?= $row->nama_customer ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1">
                            <i class="fas fa-dollar-sign"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Belanja</span>
                            <span class="info-box-number"><?= indo_currency($total_akhir->jumlah) ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1">
                            <i class="fas fa-user-tie"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Petugas</span>
                            <span class="info-box-number"><?= $row->nama_lengkap ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md mx-auto">
                    <div class="box box-widget">
                        <div class="box-body info-box">
                            <div class="col-md">
                                <div class="box-header">
                                    <div class="mt-2">
                                        <ol class="float-sm-right">
                                            <a href="<?= base_url('report/penjualan/harian/print/' . $row->sale_id) ?>" class="btn btn-primary btn-block "><i class="fa fa-plus"></i> Print
                                            </a>
                                        </ol>
                                        <span class="info-box-text">Tanggal Transaksi</span>
                                        <span class="info-box-number pb-1"><?= indo_date($row->date) ?></span>
                                    </div>
                                </div>
                                <div class="box-body text-center table-responsive">
                                    <table class="table table-sm table-bordered border text-center table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Harga Satuan</th>
                                                <th>Qty</th>
                                                <th>Diskon</th>
                                                <th>SubTotal</th>
                                                <th>Potongan</th>
                                                <th>Harga Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($saledata->result() as $key => $data) { ?>
                                                <tr>
                                                    <td style="width: 5%;"><?= $no++ ?>.</td>
                                                    <td><?= $data->nama_item ?></td>
                                                    <td><?= indo_currency($data->harga) ?></td>
                                                    <td><?= $data->qty ?></td>
                                                    <td><?= $data->discount ?>%</td>
                                                    <td><?= indo_currency($data->sub_total) ?></td>
                                                    <td><?= indo_currency($data->potongan_diskon) ?></td>
                                                    <td><?= indo_currency($data->total_akhir) ?></td>
                                                </tr>
                                            <?php } ?>

                                            <tr style="font-weight: bold;">
                                                <td class="text-left table-borderless">Jumlah</td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $qty->jumlah ?></td>
                                                <td></td>
                                                <td><?= indo_currency($sub_total->jumlah) ?></td>
                                                <td><?= indo_currency($potongan_diskon->jumlah) ?></td>
                                                <td><?= indo_currency($total_akhir->jumlah) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>