<!-- Main content -->
<section class="content">
    <div class="row pt-3">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body info-box">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="date">Date</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width: 30%;">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="user">Customer</label>
                            </td>
                            <td>
                                <div>
                                    <select class="form-group" name="" id="customer">
                                        <option value="">Umum</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body info-box">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width: 30%;">
                                <label for="kodeproduct">Kode Product</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="item_id">
                                    <input type="hidden" id="price">
                                    <input type="hidden" id="stock">
                                    <input type="text" id="kodeproduct" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="qty">QTY</label>
                            </td>
                            <td>
                                <div>
                                    <div class="form-group">
                                        <input type="number" id="qty" value="1" min="1" class="form-control">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button type="button" id="add_cart" class="btn btn-primary btn-flat">
                                        <i class="fa fa-cart-plus"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body info-box">
                    <div class="col-md">
                        <div class="col-md-6 text-center mx-auto">
                            <!-- <table width="100%" class="border"> -->
                            <h4>Invoice <b><span id="invoice">MP20210224</span></b></h4>
                            <h1><b><span id="grand_total2" style="font-size: 50pt;">0</span></b></h1>
                        </div>
                        <!-- </table> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table responsive">
                    <table class="table table-bordered text-center table-striped" id="table1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Kode Product</th>
                                <th>Nama Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th width="10%">Discount Item</th>
                                <th width="15%">Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cart-table">
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada Item</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table>
                        <tr>
                            <td style="vertical-align: top; width: 30%;">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" readonly class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width: 30%;">
                                <label for="discount">Discount</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="discount" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width: 30%;">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" value="0" readonly class="form-control">
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table>
                        <tr>
                            <td style="vertical-align: top; width: 30%;">
                                <label for="cash">Cash</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="change">Change</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="change" readonly class="form-control">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table>
                        <tr>
                            <td style="vertical-align: top; width: 30%;">
                                <label for="note">Note</label>
                            </td>
                            <td>
                                <div>
                                    <textarea id="note" rows="3" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <button id="cancel-payment" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i>Cancel
                </button><br><br>
                <button id="process-payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-o"></i>Process Payment
                </button>
            </div>
        </div>
    </div>
</section>