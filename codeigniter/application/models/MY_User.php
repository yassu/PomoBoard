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

    public function insert($user_id, $hashed_password)
    {
        $sql = sprintf("INSERT INTO `User` (`user_id`, `user_hashed_pass`) VALUES('%s', '%s');", $user_id, $hashed_password);
        $this->db->query($sql);
    }


    // $user_id, $passwordの組み合わせが正しければ $user_idを返す
    // そうでなければ False を返す
    public function authorize($user_id, $hashed_password)
    {
        $sql = sprintf("select `user_hashed_pass` from `User` where `user_id` = '%s'",$user_id);
        $correct_hashed_pass = $this->db->query($sql)->result_array()[0]['user_hashed_pass'];
        return ($hashed_password === $correct_hashed_pass)? $user_id: False ;
    }
}