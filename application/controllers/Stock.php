<?php

class Stock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['item_model', 'supplier_model', 'stock_model']);
    }

    function stock_in_data()
    {
        $data['row'] = $this->stock_model->get_stock_in()->result();
        $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
    }
    function stock_in_add()
    {
        $item      = $this->item_model->get()->result();
        $supplier  = $this->supplier_model->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }

    function stock_in_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_model->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_model->update_stock_out($data);
        $this->stock_model->del($stock_id);
        tampil_hapus($lokasi = 'stock/in');
    }

    function stock_out_data()
    {
        $data['row'] = $this->stock_model->get_stock_out()->result();
        $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
    }

    function stock_out_add()
    {
        $item = $this->item_model->get()->result();
        $data = ['item' => $item];
        $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
    }

    function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_model->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_model->update_stock_in($data);
        $this->stock_model->del($stock_id);
        tampil_hapus($lokasi = 'stock/out');
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_model->add_stock_in($post);
            $this->item_model->update_stock_in($post);
            tampil_simpan($lokasi = 'stock/in');
        } elseif (isset($_POST['out_add'])) {
            if ($_POST['qty'] > $_POST['stock']) {
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        text: 'Gagal',
                        showConfirmButton: false,
                        timer: 1500,
                        title: 'Melebihi Stok yang ada'
                    }).then((result) => {
                    window.location='<?= site_url('stock/out/add') ?>';
                    })
                </script>
                <?php
            } else {
                $this->stock_model->add_stock_out($post);
                $this->item_model->update_stock_out($post);
                tampil_simpan($lokasi = 'stock/out');
            };
        }
    }
}
