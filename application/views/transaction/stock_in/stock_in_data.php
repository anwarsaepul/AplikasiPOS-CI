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
		<div class="box-body table-responsive p-2">
			<table class="table table-bordered text-center table-striped" id="table1">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Kode Product</th>
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
							<td><?= $data->kode_product ?></td>
							<td><?= $data->nama_item ?></td>
							<td><?= $data->qty  ?></td>
							<td><?= indo_date($data->date)  ?></td>
							<td>
								<a class="btn btn-default btn-xs" id="set_detail" data-toggle="modal" data-target="#modal-detail" data-kodeproduct="<?= $data->kode_product ?>" data-nama_item="<?= $data->nama_item ?>" data-nama_supplier="<?= $data->nama_supplier ?>" 
								data-qty="<?= $data->qty ?>" 
								data-harga_beli="<?= indo_currency($data->harga_beli) ?>" 
								data-harga_jual="<?= indo_currency($data->harga_jual) ?>" 
								data-detail="<?= $data->detail ?>" 
								data-date="<?= indo_date($data->date) ?>">
									<i class="fa fa-eye"></i> Detail
								</a>
								<a href="<?= base_url('stock/in/del/' . $data->stock_id . '/' . $data->item_id) ?>" id="tmblhps" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center">Stock In Detail</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered text-center table-striped">
					<tbody>
						<tr>
							<th>Kode Product</th>
							<td><span id="kodeproduct"></span></td>
						</tr>
						<tr>
							<th>Nama Item</th>
							<td><span id="nama_item"></span></td>
						</tr>
						<tr>
							<th>Nama Suplier</th>
							<td><span id="nama_supplier"></td>
						</tr>
						<tr>
							<th>Qty</th>
							<td><span id="qty"></td>
						</tr>
						<tr>
							<th>Harga Beli</th>
							<td><span id="harga_beli"></td>
						</tr>
						<tr>
							<th>Harga Jual</th>
							<td><span id="harga_jual"></td>
						</tr>
						<tr>
							<th>Detail</th>
							<td><span id="detail"></td>
						</tr>
						<tr>
							<th>Date</th>
							<td><span id="date"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>