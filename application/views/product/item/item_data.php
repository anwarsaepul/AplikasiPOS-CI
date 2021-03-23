<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <ol class="float-sm-right">
                    <a href="<?= base_url('item/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Item
                    </a>
                </ol>
                <h3><i class="nav-icon fa fa-object-group"></i> Produk Item</h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered text-center table-striped" id="table1">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Kode Barang</th>
                        <th>Nama Item</th>
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->kode_barang ?></td>
                            <td><?= $data->nama_item ?></td>
                            <td><?= $data->nama_category ?></td>
                            <td><?= $data->nama_unit ?></td>
                            <td><?= indo_currency($data->price) ?></td>
                            <td><?= $data->stock ?></td>
                            <td class="text-center" width="150px">
                                <a href="<?= base_url('item/edit/' . $data->item_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Update</a>
                                <a href="<?= base_url('item/del/' . $data->item_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>

            </table>

        </div>
    </div>
</section>