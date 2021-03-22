<?php

class Unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('unit_model');
    }

    function index()
    {
        $data['row'] = $this->unit_model->get();
        $this->template->load('template', 'product/unit/unit_data', $data);
    }

    function add()
    {
        $unit = new stdClass();
        $unit->unit_id = null;
        $unit->nama_unit = null;
        $data = array(
            'page'  => 'add',
            'row'   => $unit
        );
        $this->template->load('template', 'product/unit/unit_form', $data);
    }


    function edit($id)
    {
        $query = $this->unit_model->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $unit
            );
            $this->template->load('template', 'product/unit/unit_form', $data);
        } else {
            echo "<script>alert('Data Tidak ditemukan');</script>";
            echo "<script>window.location='" . base_url('unit') . "';</script>";
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->unit_model->add($post);
        }elseif (isset($_POST['edit'])) {
            $this->unit_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success','Data Berhasil Disimpan');
        }
        redirect('unit');
    }

    function del($id)
    {
        $this->unit_model->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
        }
        redirect('unit');
    }
}
