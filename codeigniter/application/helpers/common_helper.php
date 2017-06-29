<?php

function datetime_now_str()
{
    return (new DateTime())->format('Y-m-d H:i:s');
}


function display_date_str($date_str)
{
    return (new DateTime($date_str))->format('Y/m/d');
}


function get_next_date_str($date_str)
{
    $date = date_create_from_format('Y-m-d', $date_str);
    $date->modify('+1 day');
    return $date->format('Y-m-d');
}


function set_flash_message($str)
{
    $CI =& get_instance();
    $CI->session->set_flashdata('message', $str);
}


function pop_flash_message()
{
    if (! array_key_exists('message', $_SESSION)) {
        return '';
    }

    $CI =& get_instance();

    $str = $CI->config->item('success_prefix');
    $str .= $CI->session->message;
    $str .= $CI->config->item('success_suffix');
    return $str;
}


function json_safe_encode($data)
{
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}
