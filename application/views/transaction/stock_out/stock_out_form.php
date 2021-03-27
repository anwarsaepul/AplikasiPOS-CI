<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <ol class="float-sm-right">
                    <a href="<?= base_url('stock/out') ?>" class="btn btn-warning btn-flat"><i class="nav-icon fa fa-undo"></i> Back
                    </a>
                </ol>
                <h3><i class="nav-icon fa fa-object-group"></i> Stock Barang</h3>
            </div>
        </div>
        <div class="box-body pb-3">
            <div class="box">
                <div class="col-md-6 mx-auto col-md-offset-6">
                    <form action="<?= base_url('stock/process') ?>" method="POST">
                        <div class="form-group">
                            <h3 class="box-title text-center"> Data Stock Keluar</h3>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal *</label>
                            <input type="date" value="<?= date('Y-m-d') ?>" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="kodebarang">Kode Barang *</label>
                            <div class="input-group">
                                <input type="hidden" name="item_id" id="item_id">
                                <input type="text" name="kodebarang" id="kodebarang" class="form-control" required autofocus placeholder="Pilih Kode Barang">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_item">Nama Item *</label>
                            <input type="text" class="form-control" name="nama_item" id="nama_item" readonly>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="nama_unit">Nama Unit *</label>
                                    <input type="text" class="form-control" name="nama_unit" id="nama_unit" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="stock">Initial Stock *</label>
                                    <input type="text" class="form-control" name="stock" id="stock" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail">Info *</label>
                            <input type="text" class="form-control" name="detail" id="detail" required placeholder="Rusak/Hilang/Kadaluarsa/ETC">
                        </div>
                        <div class="form-group">
                            <label for="qty">QTY *</label>
                            <input type="number" class="form-control" placeholder="Masukan QTY" name="qty" id="qty" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="out_add" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>Save
                            </button>
                            <button type="reset" class="btn btn-flat btn-warning"><i class="fas fa-sync-alt"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                            <th>Kode Barang</th>
                            <th>Nama Item</th>
                            <th>Unit</th>
                            <th>Price</th>
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
                                <td><?= indo_currency($data->price) ?></td>
                                <td><?= $data->stock  ?></td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-dismiss="modal" aria-label="Close" id="select" data-id="<?= $data->item_id ?>" 
                                    data-kodebarang="<?= $data->kode_product ?>" data-nama_item="<?= $data->nama_item ?>" data-nama_unit="<?= $data->nama_unit ?>" 
                                    data-stock="<?= $data->stock ?>">
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

<script>

</script>