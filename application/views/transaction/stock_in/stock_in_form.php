<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <ol class="float-sm-right">
                    <a href="<?= base_url('stock/in') ?>" class="btn btn-warning btn-flat"><i class="nav-icon fa fa-undo"></i> Back
                    </a>
                </ol>
                <h3><i class="nav-icon fa fa-object-group"></i> Stock Barang</h3>
            </div>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="col-md-6 mx-auto col-md-offset-6">
                    <form action="<?= base_url('stock/process') ?>" method="POST">
                        <div class="form-group">
                            <h3 class="box-title text-center"> Data Stock Masuk</h3>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal *</label>
                            <input type="date" value="<?= date('Y-m-d') ?>" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="kodebarang">Kode Barang *</label>
                            <div class="input-group">
                                <input type="hidden" name="item_id" id="item_id">
                                <input type="text" name="kodebarang" id="kodebarang" class="form-control" required autofocus>
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
                            <label for="detail">Detail *</label>
                            <input type="text" class="form-control" name="detail" id="detail" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier">Supplier *</label>
                            <select name="supplier" id="supplier" class="form-control">
                                <option value="">--Pilih Supplier--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty">QTY *</label>
                            <input type="text" class="form-control" name="qty" id="qty" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="in_add" class="btn btn-success btn-flat">
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