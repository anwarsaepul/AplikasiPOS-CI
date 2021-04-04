<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <h3><i class="nav-icon fas fa-file-alt"></i> Transaksi</h3>
            </div>
            <!-- <div class="row p-2"> -->
            <div class="row pt-2">
                <div class="col-12 col-sm-6 mx-auto col-md-5">
                    <div class="card-header text-center bg-success">
                        INVOICE
                    </div>
                    <div class="info-box mb-3 pl-3">
                        <table width="100%">
                            <tr>
                                <td>
                                    <span>INVOICE</span>
                                </td>
                                <td>
                                    <div>
                                        <span>: <?= $row->invoice ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Total Belanja</span>
                                </td>
                                <td>
                                    <div>
                                        <span>: <?= indo_currency($total_akhir->jumlah) ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 50%;">
                                    <span>PEMBAYARAN</span>
                                </td>
                                <td>
                                    <div>
                                        <span>: <?= $row->pembayaran ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>TANGGAL TRANSAKSI </span>
                                </td>
                                <td>
                                    <div>
                                        <span>: <?= indo_date($row->date) ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>JATUH TEMPO</span>
                                </td>
                                <td>
                                    <div>
                                        <span>: <?= indo_date($row->jatuh_tempo) ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>STATUS</span>
                                </td>
                                <td>
                                    <span>: <?= $row->status_pesanan ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>SISA PEMBAYARAN</span>
                                </td>
                                <td>
                                    <span>: <?= indo_currency($row->sisa_pembayaran) ?></span>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="col-12 col-sm-6 mx-auto col-md-3">
                    <div class="card-header text-center bg-success">
                        CUSTOMER
                    </div>
                    <div class="info-box mb-3 pl-3">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: top; width: 35%;">
                                    <span>NAMA </span>
                                </td>
                                <td>
                                    <div>
                                        <span>: <?= $row->nama_customer ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>ALAMAT</span>
                                </td>
                                <td>
                                    <span>: <?= $row->alamat_customer ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>NO HP</span>
                                </td>
                                <td>
                                    <span>: </span>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="col-12 col-sm-6 mx-auto col-md-3">
                    <div class="card-header text-center bg-success">
                        PETUGAS
                    </div>
                    <div class="info-box mb-3 pl-3">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: top; width: 35%;">
                                    <span>ADMIN</span>
                                </td>
                                <td>
                                    <div>
                                        <span>: <?= $row->nama_lengkap ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>SALES</span>
                                </td>
                                <td>
                                    <div>
                                        <span>: </span>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="col-md mx-auto">
                    <div class="box p-2 box-widget">
                        <div class="box-body info-box">
                            <div class="col-md pt-2">
                                <div class="box-body text-center table-responsive">
                                    <table class="table table-sm table-bordered border text-center table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Item</th>
                                                <th>Harga Satuan</th>
                                                <th>Qty</th>
                                                <th>Diskon</th>
                                                <th>SubTotal</th>
                                                <th>Potongan</th>
                                                <th>Total Harga</th>
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
                                                <td class="text-left" colspan="3">Jumlah</td>
                                                <td><?= $qty->jumlah ?></td>
                                                <td></td>
                                                <td><?= indo_currency($sub_total->jumlah) ?></td>
                                                <td><?= indo_currency($potongan_diskon->jumlah) ?></td>
                                                <td><?= indo_currency($total_akhir->jumlah) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="right">
                                        <div class="form-group text-right">
                                            <a href="<?= base_url('report/penjualan/kredit/' . $row->sale_id) ?>" class="btn btn-success btn-flat">
                                                <i class="fa fa-plus"></i> Bayar
                                            </a>
                                            <a href="<?= base_url('report/penjualan/print/' . $row->sale_id) ?>" class="btn btn-primary btn-flat "><i class="fas fa-print"></i> Print
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>