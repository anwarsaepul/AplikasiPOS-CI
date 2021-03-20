<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function login()
    {
        // checklog();
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

    function ceklogin()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $login = $this->Model_Auth->getlogin($username, $password);
        $ceklogin = $login->num_rows();
        $datalogin = $login->row_array();

        // Menyimpan session Login
        $data = array(
            'id_user'       => $datalogin['id_user'],
            'nama_lengkap'  => $datalogin['nama_lengkap'],
            'username'      => $datalogin['username'],
            'password'      => $datalogin['password'],
            'level'         => $datalogin['level'],
            'kode_cabang'   => $datalogin['kode_cabang']
        );
        $this->session->set_userdata($data);
        if ($ceklogin == 1) {
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('msg', '
            <div class="alert alert-warning" role="alert">
            Username atau Password salah!
            </div>');
            redirect('auth/login');
        }
    }

    function logout()
    {
        session_destroy();
        redirect('auth/login');
    }
}
