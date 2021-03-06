<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        return $query = $this->db->get();
    }

    function get($id = null)
    {
        $this->db->from('users');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        return $query = $this->db->get();
    }
}
