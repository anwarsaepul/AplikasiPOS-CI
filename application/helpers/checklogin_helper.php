<?php

function checklog(){
    $CI = &get_instance();
    $level = $CI->session->userdata('level');
    if(!empty($level)){
        redirect('dashboard');
    }
}

function checklogin(){
    $CI = &get_instance();
    $level = $CI->session->userdata('level');
    if(empty($level)){
        redirect('auth/login');
    }
}

function indo_currency($nominal){
   return $result = "Rp " . number_format($nominal, 2, ',', '.');
}

function indo_date($date){
    $d = substr($date,8,2);
    $m = substr($date,5,2);
    $y = substr($date,0,4);
    return $d.'/'.$m.'/'.$y;
}