<?php
class Sale_model extends CI_Model
{
    function get($id = null)
    {
      
        // $this->db->select('t_sale.*, nama_customer');
        $this->db->from('t_sale');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        // $this->db->join('customer', 'customer.customer_id = t_sale.customer_id');
        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        return $query = $this->db->get();
    }

    function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
                FROM t_sale 
                WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        return $invoice = "ID" . date('ymd') . $no;
    }

    function get_data()
    {
        $this->db->select('t_sale.*, nama_customer');
        $this->db->from('t_sale');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id');
        // $this->db->join('t_order', 't_order.invoice = t_sale.invoice', 'left');
        return $query = $this->db->get();
    }

    function add_transaksi($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'invoice'       => $post['invoice2'],
            'customer_id'   => $post['customer'] == '' ? null : $post['customer'],
            'sales_id'      => $post['sales'] == '' ? null : $post['sales'],
            'cash'          => $post['cash'],
            'total_harga'   => $post['grand_total'],
            'kembalian'     => $post['kembalian'],
            'catatan'       => $post['catatan'] == '' ? null : $post['catatan'],
            'date'          => $post['date'],
            'user_id'       => $this->session->userdata('user_id'),
        ];
        $this->db->insert('t_sale', $params);
    }

}
