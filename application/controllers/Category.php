<?php

class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model('category_model');
    }

    function index()
    {
        $data['row'] = $this->category_model->get();
        $this->template->load('template', 'product/category/category_data', $data);
    }

    function add()
    {
        $category = new stdClass();
        $category->category_id = null;
        $category->nama_category = null;
        $data = array(
            'page'  => 'add',
            'row'   => $category
        );
        $this->template->load('template', 'product/category/category_form', $data);
    }


    function edit($id)
    {
        $query = $this->category_model->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $category
            );
            $this->template->load('template', 'product/category/category_form', $data);
        } else {
            tampil_error($lokasi = 'category');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->category_model->add($post);
            tampil_simpan($lokasi = 'category');
        }elseif (isset($_POST['edit'])) {
            $this->category_model->edit($post);
            tampil_edit($lokasi = 'category');            
        }
    }

    function del($id)
    {
        $this->category_model->del($id);
        tampil_hapus($lokasi = 'category');
    }
}