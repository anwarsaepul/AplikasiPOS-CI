<?php defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('p_unit');
        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_unit'  => $post['nama_unit'],
        ];
        $this->db->insert('p_unit', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_unit'  => $post['nama_unit'],
            'updated'          => date('Y-m-d H:i:s'),
        ];
        $this->db->where('unit_id', $post['id']);
        $this->db->update('p_unit', $params);
    }

    function del($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
}