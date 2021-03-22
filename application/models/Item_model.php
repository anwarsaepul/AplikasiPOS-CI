<?php defined('BASEPATH') or exit('No direct script access allowed');

class item_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('p_item');
        if ($id != null) {
            $this->db->where('item_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'barcode'  => $post['barcode'],
            'nama_item'  => $post['nama_item'],
            'category_id'  => $post['category'],
            'unit_id'  => $post['unit'],
            'price'  => $post['price'],
        ];
        $this->db->insert('p_item', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'barcode'  => $post['barcode'],
            'nama_item'  => $post['nama_item'],
            'category_id'  => $post['category'],
            'unit_id'  => $post['unit'],
            'price'  => $post['price'],
            'updated'          => date('Y-m-d H:i:s'),
        ];
        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item', $params);
    }

    function del($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }
}