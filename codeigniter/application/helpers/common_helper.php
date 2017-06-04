<?php

function display_date_str($date_str)
{
    return (new DateTime($date_str))->format('Y/m/d');
}