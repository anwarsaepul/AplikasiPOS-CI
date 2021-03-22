<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('p_category');
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_category'  => $post['nama_category'],
        ];
        $this->db->insert('p_category', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_category'  => $post['nama_category'],
            'updated'          => date('Y-m-d H:i:s'),
        ];
        $this->db->where('category_id', $post['id']);
        $this->db->update('p_category', $params);
    }

    function del($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('p_category');
    }
}