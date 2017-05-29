<?php


class MY_user extends CI_Model
{
    private $_user_id;
    private $_user_hashed_pass;
    private $_created_date;
    private $_updated_date;

    public function __construct()
    {
        parent::__construct();
    }
}