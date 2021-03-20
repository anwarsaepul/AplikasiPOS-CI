<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<h2>Selamat Datang <b><?= $this->session->userdata('nama_lengkap') ?></b>, anda login sebagai <strong><?php if ($this->session->userdata('level') == 1) { ?> Admin <?php } else { ?> Kasir <?php } ?></strong>	
	</h2> 
	
</section>