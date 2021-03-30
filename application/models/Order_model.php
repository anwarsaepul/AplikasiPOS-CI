<?php
class Order_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_order');
        if ($id != null) {
            $this->db->where('order_id', $id);
        }
        return $query = $this->db->get();
    }

    function add_order($post)
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
        $this->db->insert('t_order', $params);
    }

    function update_stock_order($data)
    {
        $id         = $data['item_id'];
        $qty        = $data['qty'];
        $discount   = $data['discount'];
        $harga_jual = $data['harga_jual'];
        $invoice    = $data['invoice'];

        $sql = "UPDATE t_order SET qty = qty + '$qty', 
                sub_total = '$harga_jual' * qty, 
                discount = '$discount', 
                potongan_diskon = (discount/100) * sub_total, 
                total_akhir = sub_total - potongan_diskon, 
                invoice = '$invoice' 
                WHERE item_id = '$id'";
        $this->db->query($sql);
    }
}
