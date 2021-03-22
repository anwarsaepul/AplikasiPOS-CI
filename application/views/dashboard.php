<!-- Main content -->
<section class="content">
	<h4>Selamat Datang <b><?= $this->session->userdata('nama_lengkap') ?></b>, anda login sebagai <strong><?php if ($this->session->userdata('level') == 1) { ?> Admin <?php } else { ?> Kasir <?php } ?></strong>	
	</h4> 
	
</section>