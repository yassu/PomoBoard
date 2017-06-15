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
        $this->db->insert(
            'User', array(
            'user_id' => $user_id,
            'user_hashed_pass' => $hashed_password,
            'created_date' => datetime_now_str(),
            'updated_date' => datetime_now_str()
            )
        );
    }


    // $user_id, $passwordの組み合わせが正しければ $user_idを返す
    // そうでなければ False を返す
    public function authorize($user_id, $hashed_password)
    {
        if ($user_id === "" || $user_id === null) {
            return false;
        }

        $this->db->where('user_id', $user_id)
            ->where('is_deleted', 0);
        $results = $this->db->get('User')->result_array();

        if (empty($results)) {
            return false;
        }

        $correct_hashed_pass = $results[0]['user_hashed_pass'];
        return ($hashed_password === $correct_hashed_pass)? $user_id: false ;
    }


    public function exists($user_id)
    {
        if ($user_id === "" || $user_id == null) {
            return false;
        }

        $result = $this->db->where('user_id', $user_id)
            ->get('User')->result_array();

        return !empty($result);
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