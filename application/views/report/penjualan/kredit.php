<div class="row">
    <div class="col-sm m-4">
        <div class="box box-widget">
            <div class="box-body">
                <div class="info-box p-4 col-md-6 mx-auto">
                    <table width="100%">
                        <form action="<?= base_url('report/penjualan/process') ?>" method="POST">
                            <tr>
                                <td style="vertical-align: top;">
                                    <label for="invoice">Invoice</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input id="grand_total_v" value="<?= $row->invoice ?>" class="form-control" name="invoice" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <label for="user">Customer</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <input id="grand_total_v" value="<?= $row->nama_customer ?>" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 30%;">
                                    <label for="date">Tanggal Pembayaran</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" name="tanggal_bayar" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 30%;">
                                    <label for="date">Jatuh Tempo</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" name="date_jatuh_tempo" id="date_jatuh_tempo" value="<?= $row->jatuh_tempo ?>" 
                                        class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 30%;">
                                    <label for="grand_total_v">Sisa Pembayaran</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <!-- <input name="stock" id="stock"> -->
                                        <input type="hidden" id="grand_total" name="grand_total" value="<?= $row->sisa_pembayaran ?>" class="form-control">
                                        <input type="hidden" id="sale_id" name="sale_id" value="<?= $row->sale_id ?>" class="form-control">
                                        <input id="grand_total_v" value="<?= $row->sisa_pembayaran ?>" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 30%;">
                                    <label for="cash">Cash</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="cash" id="cash" min="0" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <label for="kembalian">Sisa Akhir</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="kembalian_v" readonly class="form-control">
                                        <input type="hidden" name="kembalian" id="kembalian" readonly class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <label for="note">Note</label>
                                </td>
                                <td>
                                    <div class="form-group mx-auto">
                                        <div>
                                            <textarea name="catatan" id="note" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <div class="mx-auto col-md-8">
                                        <input type="hidden" name="invoice2" value="">
                                        <button id="pembayaran-kredit" type="submit" name="pembayaran-kredit" class="btn btn-block btn-success">
                                            <i class="fas fa-cart-arrow-down"></i> Process Payment
                                        </button>
                                    </div>
                                </td>
                            </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>