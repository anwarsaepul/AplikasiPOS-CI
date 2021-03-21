<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<div class="col-sm">
				<ol class="float-sm-right">
					<a href="<?= base_url('supplier/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-user-plus"></i>Create
					</a>
				</ol>
				<h3><i class="nav-icon fa fa-truck"></i> Data Supplier</h3>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered text-center table-striped">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Telepon</th>
						<th>Alamat</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($row->result() as $key => $data) { ?>
						<tr>
							<td><?= $no++ ?>.</td>
							<td><?= $data->nama_supplier ?></td>
							<td><?= $data->phone ?></td>
							<td><?= $data->alamat ?></td>
							<td><?= $data->deskripsi ?></td>
							<td class="text-center" width="150px">
								<a href="<?= base_url('supplier/edit/' . $data->supplier_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Update</a>
								<a href="<?= base_url('supplier/del/' . $data->supplier_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
							</td>
						</tr>

					<?php } ?>
				</tbody>

			</table>

		</div>
	</div>
</section>