<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <ol class="float-sm-right">
                    <a href="<?= base_url('sales') ?>" class="btn btn-warning btn-flat"><i class="nav-icon fa fa-undo"></i> Back
                    </a>
                </ol>
                <h3><i class="nav-icon fa fa-users"></i> Sales</h3>
            </div>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="col-md-6 mx-auto col-md-offset-2">
                    <form action="<?= base_url('sales/process') ?>" method="POST">
                        <div class="form-group">
                            <h3 class="box-title text-center"><?= ucfirst($page) ?> Data Sales</h3>
                        </div>
                        <div class="form-group">
                            <label for="">Nama sales *</label>
                            <input type="hidden" name="id" value="<?= $row->sales_id ?>">
                            <input type="text" value="<?= $row->nama_sales ?>" class="form-control" name="nama_sales" required placeholder="Input nama sales">
                        </div>
                        <div class="form-group">
                            <label for="">No Telpon *</label>
                            <input type="number" placeholder="Input no telpon" class="form-control" value="<?= $row->phone ?>" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat sales *</label>
                            <textarea class="form-control" name="alamat" placeholder="Input alamat sales"><?= $row->alamat ?></textarea>
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