<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<div class="col-sm pt-3">
				<ol class="float-sm-right">
					<a href="<?= base_url('customer/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-user-plus"></i>Create
					</a>
				</ol>
				<h3><i class="nav-icon fa fa-users"></i> Data customer</h3>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered text-center table-striped" id="table1">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Telepon</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($row->result() as $key => $data) { ?>
						<tr>
							<td style="width: 5%;"><?= $no++ ?>.</td>
							<td><?= $data->nama_customer ?></td>
							<td><?= $data->phone ?></td>
							<td><?= $data->alamat ?></td>
							<td class="text-center" width="150px">
								<a href="<?= base_url('customer/edit/' . $data->customer_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Update</a>
								<a href="<?= base_url('customer/del/' . $data->customer_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
							</td>
						</tr>

					<?php } ?>
				</tbody>

			</table>

		</div>
	</div>
</section>