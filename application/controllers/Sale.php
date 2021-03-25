<?php
class Sale extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model("sale_model");
    }

    public function index()
    {
        $this->load->model("customer_model");
        $customer = $this->customer_model->get()->result();
        $data = array (
            'customer'  => $customer,
            'invoice'   => $this->sale_model->invoice_no(),
        );
        $this->template->load('template', 'transaction/sale/sale_form', $data);
    }
}
