<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sales_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('sales');
        if ($id != null) {
            $this->db->where('sales_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_sales'    => $post['nama_sales'],
            'phone'         => $post['phone'],
            'alamat'        => $post['alamat'],
        ];
        $this->db->insert('sales', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_sales'    => $post['nama_sales'],
            'phone'         => $post['phone'],
            'alamat'        => $post['alamat'],
            'updated'       => date('Y-m-d H:i:s'),
        ];
        $this->db->where('sales_id', $post['id']);
        $this->db->update('sales', $params);
    }


    function del($id)
    {
        $this->db->where('sales_id', $id);
        $this->db->delete('sales');
    }
}
