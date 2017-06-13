<?php


class MY_ProjectDetail extends CI_Model
{
    private $_project_detail_id;
    private $_project_id;
    private $_project_tag_id;
    private $_created_date;
    private $_updated_date;
    private $_is_deleted;

    public function __construct()
    {
        parent::__construct();
    }


    public function insert($user_id, $project_id, $project_tag_id)
    {
        $this->db->insert('ProjectDetail', array(
            'user_id' => $user_id,
            'project_id' => $project_id,
            'project_tag_id' => $project_tag_id,
            'created_date' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            )
        );
        return $this->db->insert_id();
    }
}