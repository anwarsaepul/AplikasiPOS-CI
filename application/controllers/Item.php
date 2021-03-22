<?php

class Item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model(['item_model', 'category_model', 'unit_model']);
    }

    function index()
    {
        $data['row'] = $this->item_model->get();
        $this->template->load('template', 'product/item/item_data', $data);
    }

    function add()
    {
        $item = new stdClass();
        $item->item_id = null;
        $item->barcode = null;
        $item->nama_item = null;
        $item->price = null;

        $query_category = $this->category_model->get();
        $query_unit = $this->unit_model->get();

        $data = array(
            'page'      => 'add',
            'row'       => $item,
            'category'  => $query_category,
            'unit'      => $query_unit,
        );
        $this->template->load('template', 'product/item/item_form', $data);
    }


    function edit($id)
    {
        $query = $this->item_model->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $query_category = $this->category_model->get();
            $query_unit = $this->unit_model->get();

            $data = array(
                'page'      => 'edit',
                'row'       => $item,
                'category'  => $query_category,
                'unit'      => $query_unit,
            );
            $this->template->load('template', 'product/item/item_form', $data);
        } else {
            echo "<script>alert('Data Tidak ditemukan');</script>";
            echo "<script>window.location='" . base_url('item') . "';</script>";
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->item_model->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->item_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }
        redirect('item');
    }

    function del($id)
    {
        $this->item_model->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('item');
    }
}