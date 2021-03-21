<section class="content-header">
    <h1>customers
        <small>Pemasok Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">customers</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Data customer</h3>
            <div class="pull-right">
                <a href="<?= base_url('customer') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 border col-md-offset-4">
                    <form action="<?= base_url('customer/process') ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama customer *</label>
                            <input type="hidden" name="id" value="<?= $row->customer_id ?>">
                            <input type="text" value="<?= $row->nama_customer ?>" class="form-control" name="nama_customer" required placeholder="Input nama customer">
                        </div>
                        <div class="form-group">
                            <label for="">No Telpon *</label>
                            <input type="number" placeholder="Input no telpon" class="form-control" value="<?= $row->phone ?>" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat customer *</label>
                            <textarea class="form-control" name="alamat" placeholder="Input alamat customer"><?= $row->alamat ?></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>Save
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>