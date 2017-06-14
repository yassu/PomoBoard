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
}