<?php

class MY_TaskDetail extends CI_Model
{
    private $_task_detail_id;
    private $_task_id;
    private $_task_tag_id;
    private $_created_date;
    private $_updated_date;
    private $_is_deleted;

    public function __construct()
    {
        parent::__construct();
    }


    public function insert($user_id, $task_id, $task_tag_id)
    {
        $this->db->insert(
            'TaskDetail',
            array(
                'user_id' => $user_id,
                'task_id' => $task_id,
                'task_tag_id' => $task_tag_id,
                'created_date' => datetime_now_str(),
                'updated_date' => datetime_now_str()
            )
        );
        return $this->db->insert_id();
    }


    public function delete_from_id($user_id, $task_id)
    {
        if (! $task_id)
        {
            return;
        }

        $this->db
            ->where(
                array(
                    'user_id' => $user_id,
                    'task_id' => $task_id
                )
            )
            ->update(
                'TaskDetail',
                array(
                    'is_deleted' => 1,
                    'updated_date' => datetime_now_str()
                )
            );
    }
}
