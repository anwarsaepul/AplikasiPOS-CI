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
			<h3 class="box-title">Data customer</h3>
			<div class="pull-right">
				<a href="<?= base_url('customer/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-user-plus"></i>Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered text-center table-striped">
				<thead>
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
						<td><?=$no++ ?>.</td>
						<td><?=$data->nama_customer ?></td>
						<td><?=$data->phone ?></td>
						<td><?=$data->alamat ?></td>
						<td class="text-center" width="150px">
							<a href="<?= base_url('customer/edit/' .$data->customer_id) ?>"  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Update</a>
							<a href="<?= base_url('customer/del/' .$data->customer_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
						</td>
					</tr>

					<?php } ?>
				</tbody>

			</table>

		</div>
	</div>
</section>