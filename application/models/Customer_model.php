<?php defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('customer_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_customer'  => $post['nama_customer'],
            'phone'          => $post['phone'],
            'alamat'         => $post['alamat'],
        ];
        $this->db->insert('customer', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_customer'  => $post['nama_customer'],
            'phone'          => $post['phone'],
            'alamat'         => $post['alamat'],
            'updated'          => date('Y-m-d H:i:s'),
        ];
        $this->db->where('customer_id', $post['id']);
        $this->db->update('customer', $params);
    }


    function del($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }
}