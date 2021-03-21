<?php

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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
            echo "<script>alert('Data Tidak ditemukan');</script>";
            echo "<script>window.location='" . base_url('customer') . "';</script>";
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->customer_model->add($post);
        }elseif (isset($_POST['edit'])) {
            $this->customer_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil disimpan');</script>";
        }
        echo "<script>window.location='" . base_url('customer') . "';</script>";
    }

    function del($id)
    {
        $this->customer_model->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil di Hapus');</script>";
        }
        echo "<script>window.location='" . base_url('customer') . "';</script>";
    }
}
