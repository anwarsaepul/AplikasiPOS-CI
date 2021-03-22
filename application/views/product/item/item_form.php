<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <ol class="float-sm-right">
                    <a href="<?= base_url('item') ?>" class="btn btn-warning btn-flat"><i class="nav-icon fa fa-undo"></i> Back
                    </a>
                </ol>
                <h3><i class="nav-icon fa fa-object-group"></i> Item</h3>
            </div>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="col-md-6 mx-auto col-md-offset-6">
                    <form action="<?= base_url('item/process') ?>" method="POST">
                        <div class="form-group">
                            <h3 class="box-title text-center"><?= ucfirst($page) ?> Data Item</h3>
                        </div>
                        <div class="form-group">
                            <label for="barcode">Barcode *</label>
                            <input type="hidden" name="id" value="<?= $row->item_id ?>">
                            <input type="text" value="<?= $row->barcode ?>" class="form-control" id="barcode" name="barcode" required placeholder="Input barcode">
                        </div>
                        <div class="form-group">
                            <label for="nama_item">Nama Product *</label>
                            <input type="text" id="nama_item" value="<?= $row->nama_item ?>" class="form-control" name="nama_item" required placeholder="Input nama product">
                        </div>
                        <div class="form-group">
                            <label>Category *</label>
                            <select name="category" class="form-control" id="">
                                <option value="">--Pilih Category--</option>
                                <?php foreach ($category->result() as $key => $data) { ?>
                                    <option value="<?= $data->category_id ?>"><?= $data->nama_category ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unit *</label>
                            <select name="unit" class="form-control" id="">
                                <option value="">--Pilih Unit--</option>
                                <?php foreach ($unit->result() as $key => $data) { ?>
                                    <option value="<?= $data->unit_id ?>"><?= $data->nama_unit ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga *</label>
                            <input type="number" value="<?= $row->price ?>" class="form-control" id="price" name="price" required placeholder="Input harga product">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
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