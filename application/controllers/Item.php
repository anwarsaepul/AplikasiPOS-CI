<?php

class Item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
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
        $item->item_id      = null;
        $item->kode_product = null;
        $item->nama_item    = null;
        $item->harga_jual   = null;
        $item->category_id  = null;
        $item->unit_id      = null;

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


    public function edit($id)
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
        } 
        else {
            tampil_error($lokasi = 'item');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->item_model->check_kode_product($post['kode_product'])->num_rows() > 0) {
                tampil_sama($lokasi = 'item/add');
            } else {
                $this->item_model->add($post);
                tampil_simpan($lokasi = 'item');
            }
        } elseif (isset($_POST['edit'])) {
            if ($this->item_model->check_kode_product($post['kode_product'], $post['id'])->num_rows() > 0) {
                tampil_sama($lokasi = 'item/edit/' . $post['id']);
            } else {
                $this->item_model->edit($post);
                tampil_edit($lokasi = 'item');
            }
        }
    }

    function del($id)
    {
        $this->item_model->del($id);
        tampil_hapus($lokasi = 'item');
    }
}
