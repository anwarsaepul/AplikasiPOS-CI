<?php

class Report_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['sale_model', 'order_model']);
    }

    function harian()
    {
        $data['row'] = $this->sale_model->get_data();
        $this->template->load('template', 'report/penjualan/harian', $data);
    }

    public function detail($id)
    {
        $query              = $this->sale_model->get($id);
        $saledata           = $this->sale_model->get($id);
        $qty                = $this->sale_model->hitung_total($id, $hitung = 'qty');
        $sub_total          = $this->sale_model->hitung_total($id, $hitung = 'sub_total');
        $potongan_diskon    = $this->sale_model->hitung_total($id, $hitung = 'potongan_diskon');
        $total_akhir        = $this->sale_model->hitung_total($id, $hitung = 'total_akhir');
        if ($query->num_rows() > 0) {
            $sale = $query->row();
            $data = array(
                'row'               => $sale,
                'saledata'          => $saledata,
                'sub_total'         => $sub_total,
                'qty'               => $qty,
                'potongan_diskon'   => $potongan_diskon,
                'total_akhir'       => $total_akhir,
            );
            // var_dump($sale);
            $this->template->load('template', 'report/penjualan/detail', $data);
        } else {
            tampil_error($lokasi = 'report/penjualan/harian');
        }
    }
}
