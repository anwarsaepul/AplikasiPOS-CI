<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <h3><i class="nav-icon fa fa-users"></i>Transaksi</h3>
            </div>
        </div>
        <div class="row p-2">

            <div class="col-md-3 pl-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group text-center list-group-flush">
                            <li class="list-group-item">
                                <p class="font-weight-bolder h5">Petugas</p>
                                <?= $row->nama_lengkap ?>
                            </li>
                            <li class="list-group-item">
                                <p class="font-weight-bolder h5">Uang Bayar</p>
                                <?= indo_currency($row->cash) ?>
                            </li>
                            <li class="list-group-item">
                                <p class="font-weight-bolder h5">Kembalian</p>
                                <p class="font-weight-bolder h5"></p>
                                <?= indo_currency($row->kembalian) ?>
                            </li>
                            <li class="list-group-item">
                                <p class="font-weight-bolder h5">Nama Customer</p>
                                <?= $row->nama_customer ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mx-auto">
                <div class="box box-widget">
                    <div class="box-body info-box">
                        <div class="col-md">
                            <div class="col-md  mx-auto">
                                <div class="box-header">
                                    <div class="mt-3">
                                        <ol class="float-sm-right">
                                            <a href="<?= base_url('report/penjualan/harian/print/' . $row->sale_id) ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Print
                                            </a>
                                        </ol>
                                        <span class="info-box-text"><?= indo_date($row->date) ?></span>
                                        <span class="info-box-text"><?= $row->invoice ?></span>
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
        </div>
</section>