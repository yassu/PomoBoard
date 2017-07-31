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
        $this->db->insert(
            'ProjectDetail', array(
            'user_id' => $user_id,
            'project_id' => $project_id,
            'project_tag_id' => $project_tag_id,
            'created_date' => datetime_now_str(),
            'updated_date' => datetime_now_str()
            )
        );
        return $this->db->insert_id();
    }


    public function delete_from_project_id($user_id, $project_id)
    {
        if (! $project_id)
        {
            return;
        }

        $this->db
            ->where(
                array(
                    'user_id' => $user_id,
                    'project_id' => $project_id
                )
            )
            ->update(
                'ProjectDetail',
                array(
                    'is_deleted' => 1,
                    'updated_date' => datetime_now_str()
                )
            );
    }
}
