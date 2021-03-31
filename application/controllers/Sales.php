<?php

class Sales extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model('sales_model');
    }

    function index()
    {
        $data['row'] = $this->sales_model->get();
        $this->template->load('template', 'sales/sales_data', $data);
    }

    function add()
    {
        $sales = new stdClass();
        $sales->sales_id = null;
        $sales->nama_sales = null;
        $sales->phone = null;
        $sales->alamat = null;
        $data = array(
            'page'  => 'add',
            'row'   => $sales
        );
        $this->template->load('template', 'sales/sales_form', $data);
    }


    function edit($id)
    {
        $query = $this->sales_model->get($id);
        if ($query->num_rows() > 0) {
            $sales = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $sales
            );
            $this->template->load('template', 'sales/sales_form', $data);
        } else {
            tampil_error($lokasi = 'sales');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->sales_model->add($post);
            tampil_simpan($lokasi = 'sales');
        } elseif (isset($_POST['edit'])) {
            $this->sales_model->edit($post);
            tampil_edit($lokasi = 'sales');
        }
    }

    function del($id)
    {
        $this->sales_model->del($id);
        if ($this->db->affected_rows() > 0) {
            tampil_hapus($lokasi = 'sales');
        }
    }
}
