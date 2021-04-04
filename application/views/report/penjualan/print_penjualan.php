<div class="row pl-3 pr-3 pt-3">
    <div class="col-4">
        <table width="100%">
            <tr>
                <td>
                    <span class="font-weight-bolder H5">AGUNG JAYA</span>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">
                    <span>JL. BHAYANGKARA NO 66 KOTA SUKABUMI</span>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td style="vertical-align: top; width: 30%;">
                    <span>TELP</span>
                </td>
                <td>
                    <div>
                        <span>: 085794190990/087811605800</span>
                    </div>
                </td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td>
                    <span>PETUGAS</span>
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
                        <span>: <?= $row->nama_sales ?></span>
                    </div>
                </td>
            </tr>
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
        </table>
    </div>

    <div class="col-4">
        <div class="col-md mx-auto">
            <table width="100%">
                <tr>
                    <td><br></td>
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

    <div class="col-4">
        <div class="col-md mx-auto">
            <table width="100%">
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 30%;">
                        <span>CUSTOMER </span>
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
                        <span>: <?= $row->alamat ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>NO HP</span>
                    </td>
                    <td>
                        <span>: <?= $row->phone ?></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="box-body text-center table-responsive m-2">
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
    </div>
</div>
<div class="row pr-3">
    <div class="col-6">
        <p class="mt-0 text-center">TERIMAKASIH SUDAH ORDER<br>DI TUNGGU ORDERAN SELANJUTNYA
        </p>
    </div>

    <div class="col-6 text-black">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Admin</th>
                    <th scope="col">Toko</th>
                </tr>
            </thead>
            <tbody>
                <tr style="height: 100px;">
                    <th></th>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>

</div>