<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_keranjang');
        if ($id != null) {
            $this->db->where('keranjang_id', $id);
        }
        return $query = $this->db->get();
    }

    function get_keranjang()
    {
        $this->db->select('t_keranjang.*, p_item.kode_product, nama_item, harga_jual');
        $this->db->from('t_keranjang');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('p_item', 't_keranjang.item_id = p_item.item_id');
        $this->db->order_by('keranjang_id', 'desc');
        return $query = $this->db->get();
    }

    function add_keranjang($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'item_id'       => $post['item_id'],
            'qty'           => $post['qty'],
            'discount'      => $post['discount'] == '' ? null : $post['discount'],
            'total'         => $post['sub_total'],
        ];
        $this->db->insert('t_keranjang', $params);
    }

    function del($id)
    {
        $this->db->where('keranjang_id', $id);
        $this->db->delete('t_keranjang');
    }
}