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
        flashData();
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
                tampil_simpan($lokasi = 'dashboard')
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        title: 'Login Berhasil'
                    }).then((result) => {
                    window.location='<?= site_url() ?>';
                    })
                </script>
                <?php
            }else{
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        text: 'Gagal',
                        title: 'Login Gagal'
                    }).then((result) => {
                    window.location='<?= site_url('auth/login') ?>';
                    })
                </script>
                <?php
            }
        }
    }

    function logout()
    {
        session_destroy();
        redirect('auth/login');
    }
}
