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
}