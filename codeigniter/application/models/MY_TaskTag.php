<?php

class MY_TaskTag extends CI_Model
{
    private $_task_tag_id;
    private $_task_tag_name;
    private $_created_date;
    private $_updated_date;
    private $_is_deleted;


    public function __construct()
    {
        parent::__construct();
    }


    public function update($user_id, $task_tag_id, $task_tag_name)
    {
        $this->db
            ->where(array(
                'user_id' => $user_id,
                'task_tag_id' => $task_tag_id
            ))
            ->update('TaskTag', array(
                'task_tag_name' => $task_tag_name,
                'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            ));
    }


    public function insert($user_id, $task_tag_name)
    {
        $this->db->insert('TaskTag', array(
                'user_id' => $user_id,
                'task_tag_name' => $task_tag_name,
                'created_date' => (new DateTime())->format('Y-m-d H:i:s'),
                'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            )
        );
    }


    public function delete($user_id, $task_tag_id)
    {
        $this->db
            ->where(array(
                'user_id' => $user_id,
                'task_tag_id' => $task_tag_id
            ))
            ->update('TaskTag', array(
                'is_deleted' => 1,
                'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            ));
    }


    public function get_list($user_id, $task_tag_name,
        $begin_created_date, $end_created_date,
        $begin_updated_date, $end_updated_date)
    {
        $this->db
            ->where('user_id', $user_id)
            ->where('is_deleted', 0);

        if ($task_tag_name !== "")
        {
            $this->db->like('task_tag_name', $task_tag_name);
        }

        if ($begin_created_date !== "")
        {
            $this->db->where('created_date >= ', $begin_created_date);
        }

        if ($end_created_date !== "")
        {
            $this->db->where('created_date < ', get_next_date_str($end_created_date));
        }

        if ($begin_updated_date !== "")
        {
            $this->db->where('updated_date >= ', $begin_updated_date);
        }

        if ($end_updated_date !== "")
        {
            $this->db->where('updated_date < ', $end_updated_date);
        }

        return $this->db->get('TaskTag')->result_array();
    }


    public function get_task_tag_from_task_tag_id($user_id, $task_tag_id)
    {
        $res = $this->db
            ->where('user_id', $user_id)
            ->where('is_deleted', 0)
            ->where('task_tag_id', $task_tag_id)
            ->get('TaskTag')->result_array();
        return empty($res)? null: $res[0];
    }
}