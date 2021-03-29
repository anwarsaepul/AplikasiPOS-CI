<?php

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('supplier_model');
    }

    function index()
    {
        $data['row'] = $this->supplier_model->get();
        $this->template->load('template', 'supplier/supplier_data', $data);
    }

    function add()
    {
        $supplier = new stdClass();
        $supplier->supplier_id = null;
        $supplier->nama_supplier = null;
        $supplier->phone = null;
        $supplier->alamat = null;
        $supplier->deskripsi = null;
        $data = array(
            'page'  => 'add',
            'row'   => $supplier
        );
        $this->template->load('template', 'supplier/supplier_form', $data);
    }


    function edit($id)
    {
        $query = $this->supplier_model->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $supplier
            );
            $this->template->load('template', 'supplier/supplier_form', $data);
        } else {
            tampil_error($lokasi = 'supplier');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->supplier_model->add($post);
            tampil_simpan($lokasi = 'supplier');
        }elseif (isset($_POST['edit'])) {
            $this->supplier_model->edit($post);
            tampil_edit($lokasi = 'supplier');
        }
    }

    function del($id)
    {
        $this->supplier_model->del($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Data Tidak dapat dihapus (Sudah berelasi)'
                    }).then((result) => {
                    window.location='<?= site_url('supplier') ?>';
                    })
                </script>
                <?php
        }else{
        tampil_hapus($lokasi = 'supplier');
        }
    }
}
