<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kredit_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_kredit');
        if ($id != null) {
            $this->db->where('kredit_id', $id);
        }
        return $query = $this->db->get();
    }

    function add_transaksi($post)
    {
        // $sisa = ((int)$post['grand_total']) - ((int)$post['cash']);
        $params = [
            // nama d db        => nama di inputan
            'invoice'           => $post['invoice'],
            'tanggal_bayar'     => $post['tanggal_bayar'],
            'pembayaran'        => $post['cash'],
            'catatan'           => $post['catatan'] == '' ? null : $post['catatan'],
            'user_id'           => $this->session->userdata('user_id'),
        ];
        $this->db->insert('t_kredit', $params);
    }

    function del($id)
    {
        $this->db->where('invoice', $id);
        $this->db->delete('t_kredit');
    }

}