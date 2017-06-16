<?php


class MY_IndicatedPointTag extends CI_Model
{
    private $_indicated_point_tag_id;
    private $_indicated_point_id;
    private $_user_id;
    private $_indicated_point_tag_name;
    private $_created_date;
    private $_updated_date;
    private $_is_deleted;


    public function __construct()
    {
        parent::__construct();
    }


    public function insert($user_id, $name)
    {
        $this->db->insert(
            'IndicatedPointTag',
            array(
                'user_id' => $user_id,
                'indicated_point_tag_name' => $name,
                'created_date' => datetime_now_str(),
                'updated_date' => datetime_now_str()
            )
        );
    }
}