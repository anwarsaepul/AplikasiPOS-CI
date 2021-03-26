<?php
class Sale extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model(['sale_model', 'item_model', 'customer_model', 'stock_model']);
    }

    public function index()
    {
        $item  = $this->item_model->get()->result();
        // $this->load->model("");
        $customer = $this->customer_model->get()->result();
        $data = array (
            'item'      => $item,
            'customer'  => $customer,
            'invoice'   => $this->sale_model->invoice_no(),
        );
        $this->template->load('template', 'transaction/sale/sale_form', $data);
    }
}
