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
            'project_tag_name' => $project_tag_name,
            'created_date' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            )
        );
    }
}