<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-sm-12  mx-auto">
			<div class="col-sm pt-3">
				<ol class="float-sm-right">
					<a href="<?= base_url('sales/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah sales
					</a>
				</ol>
				<h3><i class="nav-icon fa fa-users"></i> Data sales</h3>
			</div>
		</div>
		<div class="col-sm">
			<div class="box box-widget">
				<div class="box-body">
					<div class="col-md-10  mx-auto">
						<table class="table border table-bordered text-center table-striped" id="table1" style="width: 100%;">
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
										<td><?= $data->nama_sales ?></td>
										<td><?= $data->phone ?></td>
										<td><?= $data->alamat ?></td>
										<td class="text-center" width="150px">
											<a href="<?= base_url('sales/edit/' . $data->sales_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Update</a>
											<a href="<?= base_url('sales/del/' . $data->sales_id) ?>" id="tmblhps" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
										</td>
									</tr>

								<?php } ?>
							</tbody>

						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>