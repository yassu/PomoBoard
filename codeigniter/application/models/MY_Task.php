<?php


class MY_Task extends CI_Model
{
    private $_task_id;
    private $_user_id;
    private $_title;
    private $_memo;
    private $_created_date;
    private $_updated_date;
    private $_is_deleted;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($user_id, $title, $memo)
    {
        $sql = sprintf("INSERT INTO `Task` (`user_id`, `title`, `memo`) VALUES('%s', '%s', '%s');", $user_id, $title, $memo);
        $this->db->query($sql);
    }

    public function get_list($user_id, $title, $memo, $keyword)
    {
        if (! $user_id)
        {
            return array();
        }

        $this->db->where('user_id', $user_id);

        if ($title !== "")
        {
            $this->db->or_like('title', $title);
        }

        if ($memo !== "")
        {
            $this->db->like('memo', $memo);
        }

        return $this->db->get('Task');
    }
}