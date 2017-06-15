<?php


class MY_IndicatedPoint extends CI_Model
{
    private $_indicated_point_id;
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


    public function insert($user_id, $title, $memo)
    {
        $this->db->insert(
            'IndicatedPoint', array(
                'user_id' => $user_id,
                'title' => $title,
                'memo' => $memo,
                'created_date' => (new DateTime())->format('Y-m-d H:i:s'),
                'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            )
        );
    }
}