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
        $results = $this->db->query($sql)->result_array();
        $correct_hashed_pass = empty($results)? null: $results[0]['user_hashed_pass'];
        return ($hashed_password === $correct_hashed_pass)? $user_id: False ;
    }

    // Sessionの情報を用いて user_idを返す
    // ログインしていればuser_id, ログインしていなければFalseを返す
    public function logined()
    {
        return $this->authorize($this->session->user_id, $this->session->hashed_password);
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('hashed_password');
    }
}