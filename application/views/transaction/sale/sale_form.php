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
                                    <select class="form-control" id="customer">
                                        <option value="">Umum</option>
<<<<<<< HEAD
                                        <?php foreach ($customer as $cust => $data) {
                                            echo '<option value="' . $data->$customer_id . '">' . $data->nama_customer . '</option>';
=======
                                        <?php foreach($customer as $cust => $data) {
                                            echo'<option value="'.$data->$customer_id.'">'.$data->nama_customer.'</option>';
>>>>>>> parent of d72649b (Menambahkan harga beli supplier)
                                        } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
<<<<<<< HEAD
                    </form>
=======
>>>>>>> parent of d72649b (Menambahkan harga beli supplier)
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box box-widget">
<<<<<<< HEAD
                <div class="box-body info-box hitung">
                    <form action="<?= base_url('sale/process') ?>" method="POST">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: top; width: 30%;">
                                    <label for="kode_product">Kode Product</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input type="hidden" name="keranjang_id" id="keranjang_id">
                                        <input type="hidden" name="item_id" id="item_id">
                                        <input type="hidden" name="harga_jual" id="harga_jual">
                                        <input type="hidden" name="stock" id="stock">
                                        <input type="text" name="kode_product" id="kode_product" class="form-control" required autofocus>
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
                                            <input type="number" name="qty" id="qty" value="1" min="1" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 30%;">
                                    <label for="discount">Discount</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="discount" id="discount" value="0" min="0" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 30%;">
                                    <label for="sub_total">Sub Total</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="sub_total" name="sub_total" value="0" class="form-control" readonly>
                                    </div>
                                </td>
=======
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
                                    <button type="button" id="add_cart" class="btn btn-primary">
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
                            <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
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
>>>>>>> parent of d72649b (Menambahkan harga beli supplier)
                            </tr>
                        </thead>
                        <tbody id="cart-table">
                            <tr>
<<<<<<< HEAD
                                <td></td>
                                <td>
                                    <div class="">
                                        <button type="submit" id="addcart" name="add_cart" class="btn btn-block btn-primary">
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
                            <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                            <h1><b><span id="grand_total2" style="font-size: 50pt;">0</span></b></h1>
                        </div>
                        <!-- </table> -->
                    </div>
=======
                                <td colspan="9" class="text-center">Tidak ada Item</td>
                            </tr>
                        </tbody>
                    </table>
>>>>>>> parent of d72649b (Menambahkan harga beli supplier)
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table responsive">
                    <table class="table table-bordered border text-center table-striped" id="table1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Kode Product</th>
                                <th>Nama Item</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Discount Item</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $no = 1;
                        foreach ($keranjang as $i => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->kode_product ?></td>
                                <td><?= $data->nama_item ?></td>
                                <td><?= $data->harga_jual ?></td>
                                <td><?= $data->qty ?></td>
                                <td><?= $data->discount ?></td>
                                <td><?= $data->total ?></td>
                                <td>
                                    <a href="<?= base_url('sale/del/' . $data->keranjang_id . '/' . $data->item_id) ?>" id="tmblhps" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
                                    <a href="<?= base_url('sale/del/' . $data->item_id) ?>" class="btn btn-danger btn-xs" id="tmblhps"><i class="fa fa-trash"></i>Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <!-- <tbody id="cart-table"> -->

                        </tbody>
=======
    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body info-box">
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

>>>>>>> parent of d72649b (Menambahkan harga beli supplier)
                    </table>
                </div>

            </div>
        </div>
<<<<<<< HEAD
    </div>

    <div class="row">
=======
>>>>>>> parent of d72649b (Menambahkan harga beli supplier)
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body info-box">
                    <table>
                        <tr>
                            <td style="vertical-align: top; width: 30%;">
<<<<<<< HEAD
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" value="0" readonly class="form-control">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; width: 30%;">
=======
>>>>>>> parent of d72649b (Menambahkan harga beli supplier)
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
<<<<<<< HEAD
                </div>
            </div>
        </div>

        <!-- <div class="col-lg"> -->
        <div class="col-lg-6">
            <div class="box box-widget">
                <div class="box-body info-box">
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
        <div class="col-lg-6">

            <div class="row ">
                <div class="col text-center border">
                    <button id="cancel-payment" class="btn btn-flat btn-warning">
                        <i class="fa fa-refresh"></i>Cancel
                    </button>
                </div>
                <div class="col text-center border">
                    <button id="process-payment" class="btn btn-flat btn-success">
                        <i class="fa fa-paper-plane-o"></i>Process Payment
                    </button>
                </div>
            </div>
        </div>
        <!-- </div> -->

        </form>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Select Product Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered text-center table-striped" id="table1">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Kode Product</th>
                            <th>Nama Item</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($item as $i => $data) { ?>
                            <tr>
                                <td style="width: 5%;"><?= $no++ ?>.</td>
                                <td><?= $data->kode_product ?></td>
                                <td><?= $data->nama_item ?></td>
                                <td><?= $data->nama_unit ?></td>
                                <td><?= indo_currency($data->harga_jual) ?></td>
                                <td><?= $data->stock  ?></td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-dismiss="modal" aria-label="Close" id="select" data-id="<?= $data->item_id ?>" data-kode_product="<?= $data->kode_product ?>" data-harga_jual="<?= $data->harga_jual ?>" data-nama_item="<?= $data->nama_item ?>" data-nama_unit="<?= $data->nama_unit ?>" data-stock="<?= $data->stock ?>">
                                        <i class="fa fa-check"></i> Pilih</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    $(function() {
        $('body').on('keyup', '#qty', function() {
            // let total = $('#sub_total').val();
            // let discount = $('#discount').val();
            // let uang = $(this).val();

            // $('#sub_total').val(total * discount);
            alert('ok');
        });
    });
</script> -->
=======
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body info-box">
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
>>>>>>> parent of d72649b (Menambahkan harga beli supplier)
