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
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Stock Berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . base_url('stock/in') . "';</script>";
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
