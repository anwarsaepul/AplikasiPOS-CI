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
            // nama d db        => nama di inputan
            'item_id'           => $post['item_id'],
            'harga'             => $post['harga_jual'],
            'qty'               => $post['qty'],
            'discount'          => $post['discount'] == '' ? null : $post['discount'],
            'sub_total'         => $post['sub_total'],
            'potongan_diskon'   => $post['potongan_diskon'],
            'total_akhir'       => $post['total_akhir'],
            'invoice'           => $post['invoice'],
        ];
        $this->db->insert('t_keranjang', $params);
    }

    function update_stock_keranjang($data)
    {
        $id         = $data['item_id'];
        $qty        = $data['qty'];
        $discount   = $data['discount'];
        $harga_jual = $data['harga_jual'];
        $invoice    = $data['invoice'];

        $sql = "UPDATE t_keranjang SET qty = qty + '$qty', 
                sub_total = '$harga_jual' * qty, 
                discount = '$discount', 
                potongan_diskon = (discount/100) * sub_total, 
                total_akhir = sub_total - potongan_diskon, 
                invoice = '$invoice' 
                WHERE item_id = '$id'";
        $this->db->query($sql);
    }

    function del($id)
    {
        $this->db->where('keranjang_id', $id);
        $this->db->delete('t_keranjang');
    }

    function check_id_product($code, $id = null)
    {
        // nama table
        $this->db->from('t_keranjang');
        // yg di cek
        $this->db->where('item_id', $code);
        // jika id tdk null
        if ($id != null) {
            // cek keranjang_id tdk sama dgn $id
            $this->db->where('keranjang_id !=', $id);
        }
        return $query =  $this->db->get();
    }


    function hitung_total()
    {
        // menghitung jumlah nilai pada table
        $this->db->select_sum('total_akhir', 'jumlah');
        $this->db->from('t_keranjang');
        return $this->db->get()->row();
    }
}
