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

    public function set_user_id($id)
    {
        $this->_user_id = $id;
    }

    public function set_hashed_pass($pass)
    {
        $this->_user_hashed_pass = $pass;
    }

    public function set_created_date($date)
    {
        $this->_created_date = $date;
    }

    public function set_updated_date($date)
    {
        $this->_updated_date = $date;
    }

    public function insert()
    {
        $sql = sprintf("INSERT INTO `User` (`user_id`, `user_hashed_pass`) VALUES('%s', '%s');", $this->_user_id, $this->_user_hashed_pass);
        $this->db->query($sql);
    }
}