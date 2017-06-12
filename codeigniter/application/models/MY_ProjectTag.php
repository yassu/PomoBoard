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
        $this->db->insert('ProjectTag', array(
            'user_id' => $user_id,
            'project_tag_name' => $project_tag_name,
            'created_date' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            )
        );
    }


    public function get_list($user_id, $project_tag_name, $begin_created_date, $end_created_date, $begin_updated_date, $end_updated_date)
    {
        if (! $user_id)
        {
            return array();
        }

        $this->db->where('user_id', $user_id)
                 ->where('is_deleted', 0);

        if ($project_tag_name !== "")
        {
            $this->db->like('project_tag_name', $project_tag_name);
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
            $this->db->where('update_date < ', get_next_date_str($end_updated_date));
        }

        return $this->db->get('ProjectTag')->result_array();
    }
}