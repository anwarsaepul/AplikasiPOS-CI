<?php
class Sale_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->select('t_sale.*, t_sale.created as createds, customer.*, nama_lengkap, nama_sales');
        $this->db->from('t_sale');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id');
        $this->db->join('users',  'users.user_id = t_sale.user_id');
        $this->db->join('sales',  't_sale.sales_id = sales.sales_id');
        $this->db->order_by('sale_id', 'desc');
        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        return $query = $this->db->get();
    }

    function getdetailpenjualan($id)
    {
        $this->db->select('t_sale.*, t_sale.created as createds, t_order.*, users.*, nama_item, nama_sales, customer.*');
        $this->db->from('t_sale');
        $this->db->join('t_order', 't_order.invoice = t_sale.invoice', 'left');
        $this->db->join('users',  'users.user_id = t_sale.user_id');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id');
        $this->db->join('p_item', 't_order.item_id = p_item.item_id');
        $this->db->join('sales',  't_sale.sales_id = sales.sales_id');

        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        return $query = $this->db->get();
    }

    function getdetailkredit($id)
    {
        $this->db->select('sale_id, t_kredit.invoice as invoiced, jatuh_tempo, sisa_pembayaran, t_kredit.*, nama_customer');
        $this->db->from('t_sale');
        // $this->db->join('t_order', 't_order.invoice = t_sale.invoice', 'left');
        $this->db->join('t_kredit', 't_kredit.invoice = t_sale.invoice', 'left');
        // $this->db->join('users',  'users.user_id = t_sale.user_id');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id');
        // $this->db->join('p_item', 't_order.item_id = p_item.item_id');
        // $this->db->join('sales',  't_sale.sales_id = sales.sales_id');

        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        return $query = $this->db->get();
    }

    function gettransaksihariini($id)
    {
        $this->db->select('t_sale.*, t_sale.created as createds, customer.*, nama_lengkap, nama_sales');
        $this->db->from('t_sale');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id');
        $this->db->join('users',  'users.user_id = t_sale.user_id');
        $this->db->join('sales',  't_sale.sales_id = sales.sales_id');
        $this->db->order_by('sale_id', 'desc');
        if ($id != null) {
            $this->db->where('date', $id);
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

    function add_transaksi($post)
    {
        $sisa = ((int)$post['grand_total']) - ((int)$post['cash']);
        $params = [
            // nama d db        => nama di inputan
            'invoice'           => $post['invoice2'],
            'customer_id'       => $post['customer'] == '' ? null : $post['customer'],
            'sales_id'          => $post['sales'] == '' ? null : $post['sales'],
            'cash'              => $post['cash'],
            'total_harga'       => $post['grand_total'],
            'kembalian'         => $post['kembalian'],
            'catatan'           => $post['catatan'] == '' ? null : $post['catatan'],
            'date'              => $post['date'],
            'pembayaran'        => $post['pembayaran'],
            'sisa_pembayaran'   => $post['cash'] == '0' ? $post['grand_total'] : $sisa,
            'status_pesanan'    => $post['pembayaran'] == 'kredit' ? 'Belum Lunas' : 'Lunas',
            'jatuh_tempo'       => $post['date_jatuh_tempo'],
            'user_id'           => $this->session->userdata('user_id'),
        ];
        $this->db->insert('t_sale', $params);
    }

    function del($id)
    {
        $this->db->where('invoice', $id);
        $this->db->delete('t_sale');
    }

    function update_pembayaran($post)
    {
        $cash               = $post['cash'];
        $sisa_pembayaran    = ((int)$post['grand_total']) - ((int)$post['cash']);
        $kembalian          = $post['kembalian'];
        $updated            = date('Y-m-d H:i:s');
        $id                 = $post['sale_id'];
        $status             = 'Lunas';

        $sql = "UPDATE t_sale SET cash = cash + '$cash', 
                sisa_pembayaran = '$sisa_pembayaran',
                updated = '$updated' WHERE sale_id = '$id'";
        $this->db->query($sql);
        if ($kembalian > 0) {
            $sql = "UPDATE t_sale SET status_pesanan = '$status',
                    sisa_pembayaran = '0', 
                    updated = '$updated'
                    WHERE sale_id = '$id'";
            $this->db->query($sql);
        }
    }
}
