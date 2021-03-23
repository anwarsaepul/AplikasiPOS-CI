<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<div class="col-sm pt-3">
				<ol class="float-sm-right">
					<a href="<?= base_url('stock/in/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add Stok
					</a>
				</ol>
				<h3><i class="nav-icon fa fa-object-group"></i> Stock Barang</h3>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered text-center table-striped" id="table1">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Kode Barang</th>
						<th>Product Item</th>
						<th>Qty</th>
						<th>Date</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($row as $i => $data) { ?>
						<tr>
							<td style="width: 5%;"><?= $no++ ?>.</td>
							<td><?= $data->kode_barang ?></td>
							<td><?= $data->nama_item ?></td>
							<td><?= $data->qty  ?></td>
							<td><?= indo_date($data->date)  ?></td>
							<td>
								<button class="btn btn-default btn-xs">
									<i class="fa fa-eye"></i> Detail
								</button>
								<button href="<?php base_url('stock/in/del/' .$data->stock_id) ?>" onclick="return confirm('Yakin hapus data <?= $data->kode_barang ?>?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</button>
							</td>
						</tr>
					<?php } ?>
				</tbody>

			</table>

		</div>
	</div>
</section>