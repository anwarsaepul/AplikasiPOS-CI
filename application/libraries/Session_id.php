<?php 
    Class Session_id
    {
        protected $ci;
        function __construct()
        {
            $this->ci =& get_instance();
        }

        function user_login()
        {
            $this->ci->load->model('user_model');
            $user_id = $this->ci->session->userdata('user_id');
            return $user_data = $this->ci->user_model->get($user_id)->row();
        }
    }