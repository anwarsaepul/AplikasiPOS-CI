<?php
class Sale_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->select('t_sale.*, t_order.*, order_id, p_item.*, nama_customer, alamat, username, nama_lengkap');
        $this->db->from('t_sale');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id');
        $this->db->join('t_order', 't_sale.invoice = t_order.invoice');
        $this->db->join('users',  'users.user_id = t_sale.user_id');
        // $this->db->join('sales',  't_sale.sales_id = sales.sales_id ');
        $this->db->join('p_item', 't_order.item_id = p_item.item_id');
        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        return $query = $this->db->get();
    }

    function getp($id = null)
    {
        $this->db->select('t_sale.*, customer.*, nama_lengkap, nama_sales');
        $this->db->from('t_sale');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id');
        $this->db->join('users',  'users.user_id = t_sale.user_id');
        $this->db->join('sales',  't_sale.sales_id = sales.sales_id');
        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        return $query = $this->db->get();
    }

    function getsale($id = null)
    {
        $this->db->select('t_sale.*, order_id, item_id');
        $this->db->from('t_sale');
        // $this->db->join('customer', 't_sale.customer_id = customer.customer_id');
        $this->db->join('t_order', 't_order.invoice = t_sale.invoice', 'left');
        $this->db->join('users',  'users.user_id = t_sale.user_id');
        // $this->db->join('p_item', 't_order.item_id = p_item.item_id');
        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        return $query = $this->db->get();
    }

    function hitung_total($id = null, $hitung = null)
    {
        // menghitung jumlah nilai pada table
        $this->db->select('sale_id', $hitung);
        $this->db->select_sum($hitung, 'jumlah');
        $this->db->from('t_sale');
        $this->db->join('t_order', 't_sale.invoice = t_order.invoice');
        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        return $this->db->get('')->row();
    }

    function tampil($id = null)
    {
        // menghitung jumlah nilai pada table
        $this->db->select('item_id');
        // $this->db->select_sum($hitung, 'jumlah');
        $this->db->from('t_sale');
        $this->db->where('sale_id', $id);
        $this->db->join('t_order', 't_sale.invoice = t_order.invoice');
        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        return $this->db->get()->result();
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

    function get_data($id = null)
    {
        $this->db->select('t_sale.*, nama_customer, alamat, username, nama_lengkap');
        $this->db->from('t_sale');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id');
        $this->db->join('users',  'users.user_id = t_sale.user_id');
        // $this->db->where('date', '2021-04-02');
        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
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
            'pembayaran'    => $post['pembayaran'],
            'status'        => $post['pembayaran'] == 'kredit' ? 'Belum Lunas' : 'Lunas',
            'jatuh_tempo'   => $post['date_jatuh_tempo'],
            'user_id'       => $this->session->userdata('user_id'),
        ];
        $this->db->insert('t_sale', $params);
    }

    function del($id)
    {
        $this->db->where('sale_id', $id);
        $this->db->delete('t_sale');
    }

}
