<!-- Main content -->
<section class="content">
	<div class="row pt-3">
		<!-- /.col -->
		<div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
				<span class="info-box-icon bg-danger elevation-1"> <i class="nav-icon fa fa-truck"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Supplier</span>
					<span class="info-box-number"><?= $this->session_id->count_supplier() ?></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
				<span class="info-box-icon bg-success elevation-1"> <i class="nav-icon fa fa-users"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Customers</span>
					<span class="info-box-number"><?= $this->session_id->count_customer() ?></span>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-3">
			<div class="info-box">
				<span class="info-box-icon bg-warning elevation-1"> <i class="nav-icon fas fa-shopping-cart"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Items</span>
					<span class="info-box-number"><?= $this->session_id->count_item() ?></span>
				</div>
			</div>
		</div>

		<div class="col-12 col-sm-6 col-md-3">
			<div class="info-box">
				<span class="info-box-icon bg-info elevation-1">
					<i class="nav-icon fas fa-user-plus"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">User</span>
					<span class="info-box-number"><?= $this->session_id->count_user() ?></span>
				</div>
			</div>
		</div>

</section>