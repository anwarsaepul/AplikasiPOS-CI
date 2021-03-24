<?php

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model('customer_model');
    }

    function index()
    {
        $data['row'] = $this->customer_model->get();
        $this->template->load('template', 'customer/customer_data', $data);
    }

    function add()
    {
        $customer = new stdClass();
        $customer->customer_id = null;
        $customer->nama_customer = null;
        $customer->phone = null;
        $customer->alamat = null; 
        $data = array(
            'page'  => 'add',
            'row'   => $customer
        );
        $this->template->load('template', 'customer/customer_form', $data);
    }


    function edit($id)
    {
        $query = $this->customer_model->get($id);
        if ($query->num_rows() > 0) {
            $customer = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $customer
            );
            $this->template->load('template', 'customer/customer_form', $data);
        } else {
            tampil_error($lokasi = 'customer');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->customer_model->add($post);
            tampil_simpan($lokasi = 'customer');
        }elseif (isset($_POST['edit'])) {
            $this->customer_model->edit($post);
            tampil_edit($lokasi = 'customer');
        }
    }

    function del($id)
    {
        $this->customer_model->del($id);
        if ($this->db->affected_rows() > 0) {
            tampil_hapus($lokasi = 'customer');
        }
    }
}
