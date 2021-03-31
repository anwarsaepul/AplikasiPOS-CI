<?php
class Sale extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['sale_model', 'item_model', 'customer_model', 'sales_model', 'stock_model', 'keranjang_model', 'order_model']);
    }

    function index()
    {
        $item           = $this->item_model->get()->result();
        $keranjang      = $this->keranjang_model->get_keranjang()->result();
        $hitung_total   = $this->keranjang_model->hitung_total();
        $customer       = $this->customer_model->get()->result();
        $sales          = $this->sales_model->get()->result();

        $data = array(
            'item'          => $item,
            'keranjang'     => $keranjang,
            'customer'      => $customer,
            'sales'         => $sales,
            'hitung_total'  => $hitung_total,
            'invoice'       => $this->sale_model->invoice_no(),
        );
        $this->template->load('template', 'transaction/sale/sale_form', $data);
        $this->cart->insert($data);
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add_cart'])) {
            if ($post['qty'] > $post['stock']) {
                // validasi stok
                tampil_melebihi_stok($lokasi = 'sale');
            } else {
                // validasi produk jika kode produk sama, maka datanya akan di update
                if ($this->keranjang_model->check_id_product($post['item_id'])->num_rows() > 0) {
                    $this->keranjang_model->update_stock_keranjang($post);
                    $this->order_model->update_stock_order($post);
                    // menghitung total
                    $data['total'] = $this->keranjang_model->hitung_total();
                    // tampil_simpan('sale');
                    redirect('sale');
                } else {
                    $this->keranjang_model->add_keranjang($post);
                    $this->order_model->add_order($post);
                    $this->item_model->update_stock_out($post);
                    redirect('sale');
                }
            }
        } else if (isset($_POST['process-payment'])) {
            $this->sale_model->add_transaksi($post);
            $this->db->empty_table('t_keranjang');
            redirect('sale');
        }
    }


    function del($id)
    {
        $keranjang_id = $this->uri->segment(3);
        $item_id = $this->uri->segment(4);
        $qty = $this->keranjang_model->get($keranjang_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_model->update_stock_in($data);
        $this->keranjang_model->del($id);
        if ($this->db->affected_rows() > 0) {
            tampil_hapus($lokasi = 'sale');
        }
    }
}
