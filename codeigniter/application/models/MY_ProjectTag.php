<?php


class MY_ProjectTag extends CI_Model
{
    private $_project_tag_id;
    private $_project_tag_name;
    private $_created_date;
    private $_updated_date;
    private $_is_deleted;

    public function __construct()
    {
        parent::__construct();
    }


    public function insert($user_id, $project_tag_name)
    {
        $this->db->insert(
            'ProjectTag', array(
            'user_id' => $user_id,
            'project_tag_name' => $project_tag_name,
            'created_date' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            )
        );
    }


    public function update($user_id, $project_tag_id, $project_tag_name)
    {
        $this->db
            -> where(
                array(
                'user_id' => $user_id,
                'project_tag_id' => $project_tag_id
                )
            )
            ->update(
                'ProjectTag',
                array(
                    'project_tag_name' => $project_tag_name,
                    'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
                )
            );
    }


    public function get_project_tag_from_project_tag_id($user_id, $project_tag_id)
    {
        if (! $user_id) {
            return null;
        }

        $res = $this->db->where('user_id', $user_id)
            ->where('is_deleted', 0)
            ->where('project_tag_id', $project_tag_id)
            ->get('ProjectTag')->result_array();

        return empty($res)? null: $res[0];
    }


    public function get_all($user_id)
    {
        if (! $user_id) {
            return array();
        }

        return $this->db
            ->where('user_id', $user_id)
            ->where('is_deleted', 0)
            ->get('ProjectTag')->result_array();
    }


    public function get_list($user_id, $project_tag_name, $begin_created_date, $end_created_date, $begin_updated_date, $end_updated_date)
    {
        if (! $user_id) {
            return array();
        }

        $this->db->where('user_id', $user_id)
            ->where('is_deleted', 0);

        if ($project_tag_name !== "") {
            $this->db->like('project_tag_name', $project_tag_name);
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
            $this->db->where('update_date < ', get_next_date_str($end_updated_date));
        }

        return $this->db->get('ProjectTag')->result_array();
    }


    public function delete($user_id, $project_tag_id)
    {
        $this->db
            ->where(
                array(
                'user_id' => $user_id,
                'project_tag_id' => $project_tag_id
                )
            )
            ->update(
                'ProjectTag',
                array(
                    'is_deleted' => 1,
                    'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
                )
            );
    }


    public function get_dropdown_array($user_id)
    {
        if ($user_id === null || $user_id === "") {
            return array();
        }

        $dropdown_array = array(
            array(
                'project_tag_id'=> '',
                'project_tag_name'=> '--'
            )
        );
        foreach ($this->get_all($user_id) as $project_tag)
        {
            array_push(
                $dropdown_array, array(
                'project_tag_id' => $project_tag['project_tag_id'],
                'project_tag_name' => $project_tag['project_tag_name']
                )
            );
        }

        return $dropdown_array;
    }
}