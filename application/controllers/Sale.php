<?php
class Sale extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['sale_model', 'item_model', 'customer_model', 'stock_model', 'keranjang_model']);
    }

    function index()
    {
        $item  = $this->item_model->get()->result();
        $keranjang = $this->keranjang_model->get_keranjang()->result();
        $customer = $this->customer_model->get()->result();
        $data = array(
            'item'      => $item,
            'keranjang' => $keranjang,
            'customer'  => $customer,
            'invoice'   => $this->sale_model->invoice_no(),
        );
        $this->template->load('template', 'transaction/sale/sale_form', $data);
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add_cart'])) {

            if ($this->keranjang_model->check_id_product($post['item_id'])->num_rows() > 0) {
                // tampil_sama($lokasi = 'sale');
                $this->keranjang_model->update_stock_keranjang($post);
                tampil_simpan('sale');
            } else {
                $this->keranjang_model->add_keranjang($post);
                $this->item_model->update_stock_out($post);
                tampil_simpan('sale');
            }
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
