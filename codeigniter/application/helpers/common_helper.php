<?php

function display_date_str($date_str)
{
    return (new DateTime($date_str))->format('Y/m/d');
}


function set_flash_message($instance, $str)
{
    $instance->session->set_flashdata('message', $str);
}


function pop_flash_message($instance)
{
    $str = $instance->config->item('success_prefix');
    $str .= isset($_SESSION['message'])? $instance->session->message: '';
    $str .= $instance->config->item('success_suffix');
    return $str;
}