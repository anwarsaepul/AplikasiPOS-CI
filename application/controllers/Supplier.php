<?php 

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('supplier_model');
    }

    function index()
    {
        $data['row'] = $this->supplier_model->get();
        $this->template->load('template', 'supplier/supplier_data', $data);
    }

    function del($id)
    {
        $this->supplier_model->del($id);
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data Berhasil di Hapus');</script>";
        } echo "<script>window.location='".base_url('supplier')."';</script>";

    }


}