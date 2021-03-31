<?php

class Report_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['order_model','sale_model', 'keranjang_model', 'customer_model', 'sales_model']);
    }

    function harian()
    {
        // $item           = $this->item_model->get()->result();
        $keranjang      = $this->keranjang_model->get_keranjang()->result();
        $hitung_total   = $this->keranjang_model->hitung_total();
        $customer       = $this->customer_model->get()->result();
        $sales          = $this->sales_model->get()->result();
        $sale          = $this->sale_model->get_data()->result();
        

        $data = array(
            // 'item'          => $item,
            'keranjang'     => $keranjang,
            'customer'      => $customer,
            'sales'         => $sales,
            'sale'         => $sale,
            'hitung_total'  => $hitung_total,
            'invoice'       => $this->sale_model->invoice_no(),
        );
        $this->template->load('template', 'report/penjualan/harian', $data);
    }

    function del($id)
    {
        $keranjang_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->keranjang_model->get($keranjang_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_model->update_stock_in($data);
        $this->keranjang_model->del($id);
        if ($this->db->affected_rows() > 0) {
            tampil_hapus($lokasi = 'sale');
        }
    }
}