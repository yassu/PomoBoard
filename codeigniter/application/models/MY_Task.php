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


    public function insert($user_id, $title, $memo, $project_id)
    {
        if ($user_id === null || $user_id === "") {
            return false;
        }
        else
        {
            $this->db->insert(
                'Task', array(
                'user_id' => $user_id,
                'title' => $title,
                'memo' => $memo,
                'created_date' => datetime_now_str(),
                'updated_date' => datetime_now_str(),
                'project_id' => $project_id
                )
            );
            return true;
        }
    }

    public function update($user_id, $task_id, $title, $memo, $project_id)
    {
        if ($user_id === null || $user_id === "") {
            return false;
        }

        $this->db
            ->where('task_id', $task_id)
            ->update(
                'Task', array(
                'title' => $title,
                'memo' => $memo,
                'updated_date' => datetime_now_str(),
                'project_id' => intval($project_id)
                )
            );

        return true;
    }

    public function remove($user_id, $task_id)
    {
        $this->db
            ->where(
                array(
                'user_id' => $user_id,
                'task_id' => $task_id
                )
            )
            ->update(
                'Task',
                array(
                    'is_deleted' => 1,
                    'updated_date' => datetime_now_str()
                )
            );
    }


    public function get_task_from_task_id($user_id, $task_id)
    {
        if (! $user_id) {
            return array();
        }

        return $this->db
            ->where(
                array(
                'user_id' => $user_id,
                'task_id' => $task_id
                )
            )
            ->get('Task')
            ->result_array()[0];
    }


    public function get_list($user_id, $title, $memo, $keyword,
        $begin_created_date, $end_created_date, $begin_updated_date, $end_updated_date
    ) {
    
        if (! $user_id) {
            return array();
        }

        $this->db->where('user_id', $user_id)
            ->where('is_deleted', 0);

        if ($title !== "") {
            $this->db->like('title', $title);
        }

        if ($memo !== "") {
            $this->db->like('memo', $memo);
        }

        if ($keyword !== "") {
            $this->db
                ->group_start()
                ->like('title', $keyword)
                ->or_like('memo', $keyword)
                ->group_end();
        }

        if ($begin_created_date !== "") {
            $this->db->where('created_date >= ', $begin_created_date);
        }

        if ($end_created_date !== "") {
            $this->db->where('created_date < ', get_next_date_str($end_created_date));
        }

        if ($begin_updated_date !== "") {
            $this->db->where('updated_date >= ', $begin_updated_date);
        }

        if ($end_updated_date !== "") {
            $this->db->where('updated_date < ', get_next_date_str($end_updated_date));
        }

        return $this->db->get('Task')->result_array();
    }
}