<?php defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('supplier');
        if ($id != null) {
            $this->db->where('supplier_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_supplier'  => $post['nama_supplier'],
            'phone'          => $post['phone'],
            'alamat'         => $post['alamat'],
            'deskripsi'      => empty($post['deskripsi']) ? null : $post['deskripsi'],
        ];
        $this->db->insert('supplier', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_supplier'  => $post['nama_supplier'],
            'phone'          => $post['phone'],
            'alamat'         => $post['alamat'],
            'deskripsi'      => empty($post['deskripsi']) ? null : $post['deskripsi'],
            'updated'          => date('Y-m-d H:i:s'),
        ];
        $this->db->where('supplier_id', $post['id']);
        $this->db->update('supplier', $params);
    }


    function del($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
}