<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<div class="col-sm pt-3">
				<ol class="float-sm-right">
					<a href="<?= base_url('unit/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Unit
					</a>
				</ol>
				<h3><i class="nav-icon fa fa-object-group"></i> Data Unit</h3>
			</div>
		</div>
		<div class="box-body table-responsive">
			<div class="box">
				<div class="col-md-8 mx-auto col-md-offset-4">
					<table class="table table-bordered border text-center table-striped" id="table1">
						<thead class="thead-dark">
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($row->result() as $key => $data) { ?>
								<tr>
									<td style="width: 5%;"><?= $no++ ?>.</td>
									<td><?= $data->nama_unit ?></td>
									<td class="text-center" width="150px">
										<a href="<?= base_url('unit/edit/' . $data->unit_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Update</a>
										<a href="<?= base_url('unit/del/' . $data->unit_id) ?>" id="tmblhps" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
									</td>
								</tr>

							<?php } ?>
						</tbody>

					</table>
				</div>
			</div>

		</div>
	</div>
</section>