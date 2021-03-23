<?php

class Stock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model(['item_model', 'supplier_model', 'stock_model']);
    }

    function stock_in_data()
    {
        // $item = $this->item_model->get()->result();
        // $data = ['item' => $item];
        $this->template->load('template', 'transaction/stock_in/stock_in_data');
    }
    function stock_in_add()
    {
        $item      = $this->item_model->get()->result();
        $supplier  = $this->supplier_model->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }
    function process()
    {
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_model->add_stock_in($post);
            $this->item_model->update_stock_in($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Stock Berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . base_url('stock/in') . "';</script>";
        };
    }
}
