<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function login()
    {
        checklog();
        $this->load->view('auth/login');
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['login'])){
            $this->load->model('user_model');
            $query = $this->user_model->login($post);
            if($query->num_rows() > 0 ){
                // di ekstra
                // $row = $query->row();
                $datalogin = $query->row_array();
                $data = array(
                    'user_id'       => $datalogin['user_id'],
                    'nama_lengkap'  => $datalogin['nama_lengkap'],
                    'username'      => $datalogin['username'],
                    'no_hp'         => $datalogin['no_hp'],
                    'password'      => $datalogin['password'],
                    'level'         => $datalogin['level'],

                );
                $this->session->set_userdata($data);
                echo "<script>
                    alert('Login Berhasil');
                    window.location='".site_url('dashboard')."';
                </script>";
            }else{
                echo "<script>
                    alert('Login Gagal');
                    window.location='".site_url('auth/login')."';
                </script>";
            }
            
        }
    }

    function logout()
    {
        session_destroy();
        redirect('auth/login');
    }
}
