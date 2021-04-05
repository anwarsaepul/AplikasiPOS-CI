<?php

class Report_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['sale_model', 'order_model', 'item_model', 'kredit_model']);
    }

    function harian()
    {
        $data['row'] = $this->sale_model->get();
        $this->template->load('template', 'report/penjualan/harian', $data);
    }

    function detail($id)
    {
        $query              = $this->sale_model->getdetailpenjualan($id);
        $qty                = $this->sale_model->hitung_total($id, $hitung = 'qty');
        $sub_total          = $this->sale_model->hitung_total($id, $hitung = 'sub_total');
        $potongan_diskon    = $this->sale_model->hitung_total($id, $hitung = 'potongan_diskon');
        $total_akhir        = $this->sale_model->hitung_total($id, $hitung = 'total_akhir');
        if ($query->num_rows() > 0) {
            $sale = $query->row();
            $data = array(
                'query'             => $query,
                'row'               => $sale,
                'sub_total'         => $sub_total,
                'qty'               => $qty,
                'potongan_diskon'   => $potongan_diskon,
                'total_akhir'       => $total_akhir,
            );
            // var_dump($sale);
            $this->template->load('template', 'report/penjualan/detail', $data);
        } else {
            tampil_error($lokasi = 'report/penjualan');
        }
    }

    function del($id)
    {
        $this->sale_model->del($id);
        $this->order_model->del($id);
        $this->kredit_model->del($id);
        tampil_hapus($lokasi = 'report/penjualan');
    }

    function print_penjualan($id)
    {
        $query              = $this->sale_model->getdetailpenjualan($id);
        $qty                = $this->sale_model->hitung_total($id, $hitung = 'qty');
        $sub_total          = $this->sale_model->hitung_total($id, $hitung = 'sub_total');
        $potongan_diskon    = $this->sale_model->hitung_total($id, $hitung = 'potongan_diskon');
        $total_akhir        = $this->sale_model->hitung_total($id, $hitung = 'total_akhir');
        if ($query->num_rows() > 0) {
            $sale = $query->row();
            $data = array(
                'query'             => $query,
                'row'               => $sale,
                'sub_total'         => $sub_total,
                'qty'               => $qty,
                'potongan_diskon'   => $potongan_diskon,
                'total_akhir'       => $total_akhir,
            );
            // var_dump($sale);
            $this->template->load('template', 'report/penjualan/print_penjualan', $data);
            print_data();
        } else {
            tampil_error($lokasi = 'report/penjualan');
        }
    }

    function kredit($id)
    {
        $query  = $this->sale_model->getdetailpenjualan($id);
        if ($query->num_rows() > 0) {
            $sale = $query->row();
            $data = array(
                'query'             => $query,
                'row'               => $sale,
            );
            // var_dump($tampil);
            $this->template->load('template', 'report/penjualan/kredit', $data);
        } else {
            tampil_error($lokasi = 'report/penjualan/kredit');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['pembayaran-kredit'])) {
            $this->kredit_model->add_transaksi($post);
            $this->sale_model->update_pembayaran($post);
            // $this->db->empty_table('t_keranjang');
            // redirect('sale');
            tampil_simpan('report/penjualan/kredit/' . $post['sale_id']);
        }
    }
}
