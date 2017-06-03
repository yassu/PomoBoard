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
        if ($user_id === null || $user_id === "")
        {
            return false;
        }
        else
        {
            $this->db->insert('Task', array(
                'user_id' => $user_id,
                'title' => $title,
                'memo' => $memo
                )
            );
            return true;
        }
    }


    public function get_list($user_id, $title, $memo, $keyword)
    {
        if (! $user_id)
        {
            return array();
        }

        $this->db->where('user_id', $user_id)
                  ->where('is_deleted', 0);

        if ($title !== "")
        {
            $this->db->like('title', $title);
        }

        if ($memo !== "")
        {
            $this->db->like('memo', $memo);
        }

        if ($keyword !== "")
        {
            $this->db
                ->group_start()
                    ->like('title', $keyword)
                    ->or_like('memo', $keyword)
                ->group_end();
        }

        return $this->db->get('Task')->result_array();
    }
}