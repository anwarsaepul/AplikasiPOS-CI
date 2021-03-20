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

    function del($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
}