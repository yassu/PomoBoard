<?php


class MY_Project extends CI_Model
{
    private $_project_id;
    private $_user_id;
    private $_project_name;
    private $_created_date;
    private $_updated_date;
    private $_is_deleted;

    public function __construct()
    {
        parent::__construct();
    }


    public function get_project($user_id, $project_id)
    {
        if (! $user_id)
        {
            return array();
        }

        $result = $this->db
            ->where('user_id', $user_id)
            ->where('is_deleted', 0)
            ->where('project_id', $project_id)
            ->get('Project')->result_array();

        return empty($result)? null: $result[0];
    }


    public function get_all($user_id)
    {
        if (! $user_id)
        {
            return $array();
        }

        return $this->db
            ->where('user_id', $user_id)
            ->where('is_deleted', 0)
            ->get('Project')->result_array();
    }


    public function get_list($user_id, $name)
    {
        if (! $user_id)
        {
            return array();
        }

        $this->db->where('user_id', $user_id)
                  ->where('is_deleted', 0);

        if ($name !== "")
        {
            $this->db->like('project_name', $name);
        }

        return $this->db->get('Project')->result_array();
    }


    public function insert($user_id, $project_name)
    {
        $this->db->insert('Project', array(
            'user_id' => $user_id,
            'project_name' => $project_name,
            'created_date' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            )
        );
    }


    public function update($user_id, $project_id, $project_name)
    {
        if ($user_id === null || $user_id === "")
        {
            return false;
        }

        $this->db
            ->where('user_id', $user_id)
            ->where('project_id', $project_id)
            ->update('Project', array(
                'project_name' => $project_name,
                'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            ));

        return true;
    }


    public function delete($user_id, $project_id)
    {
        if ($user_id === null || $user_id === "")
        {
            return false;
        }

        $this->db
            ->where(array(
                'user_id' => $user_id,
                'project_id' => $project_id
            ))
            ->update(
                'Project',
                array(
                    'is_deleted' => 1,
                    'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
                )
            );
    }

    // array(project_id1 => project_name1, ... project_idn => project_namen) の形式
    public function get_dropdown_array($user_id)
    {
        if ($user_id === null || $user_id === "")
        {
            return array();
        }

        $dropdown_array = array(
            '' => '--'
        );
        foreach ($this->get_all($user_id) as $project)
        {
            $dropdown_array[$project['project_id']] = $project['project_name'];
        }
        return $dropdown_array;
    }
}