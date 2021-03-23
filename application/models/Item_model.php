<?php defined('BASEPATH') or exit('No direct script access allowed');

class item_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->select('p_item.*, nama_category, p_unit.nama_unit as nama_unit');
        $this->db->from('p_item');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
        $this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
        if ($id != null) {
            $this->db->where('item_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'kode_product'   => $post['kode_product'],
            'nama_item'     => $post['nama_item'],
            'category_id'   => $post['category'],
            'unit_id'       => $post['unit'],
            'price'         => $post['price'],
        ];
        $this->db->insert('p_item', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'kode_product'  => $post['kode_product'],
            'nama_item'  => $post['nama_item'],
            'category_id'  => $post['category'],
            'unit_id'  => $post['unit'],
            'price'  => $post['price'],
            'updated'          => date('Y-m-d H:i:s'),
        ];
        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item', $params);
    }

    function check_kode_product($code, $id = null)
    {
        $this->db->from('p_item');
        $this->db->where('kode_product', $code);
        if ($id != null) {
            $this->db->where('item_id !=', $id);
        }
            return $query =  $this->db->get();
    }

    function del($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }

    function update_stock_in($data)
    {
        $qty    = $data['qty'];
        $id     = $data['item_id'];
        $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }

    function update_stock_out($data)
    {
        $qty    = $data['qty'];
        $id     = $data['item_id'];
        $sql = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }
}
