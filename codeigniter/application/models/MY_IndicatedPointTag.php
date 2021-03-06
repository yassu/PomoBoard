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



    public function update($user_id, $indicated_point_tag_id, $name)
    {
        if ( ! $user_id )
        {
            return array();
        }

        $this->db
            ->where(array(
                'user_id' => $user_id,
                'is_deleted' => 0,
                'indicated_point_tag_id' => $indicated_point_tag_id
            ))
            ->update('IndicatedPointTag', array(
                    'indicated_point_tag_name' => $name,
                    'updated_date' => datetime_now_str()
                )
            );
    }


    public function delete($user_id, $indicated_point_tag_id)
    {
        if (! $user_id)
        {
            return;
        }

        $this->db
            ->where(array(
                'user_id' => $user_id,
                'is_deleted' => 0,
                'indicated_point_tag_id' => $indicated_point_tag_id
            ))
            ->update('IndicatedPointTag', array(
                'is_deleted' => 1,
                'updated_date' => datetime_now_str()
            ));
    }


    public function get_by_indicated_point_tag_id($user_id, $indicated_point_tag_id)
    {
        if (! $user_id)
        {
            return array();
        }

        $res = $this->db
            ->where('user_id', $user_id)
            ->where('is_deleted', 0)
            ->where('indicated_point_tag_id', $indicated_point_tag_id)
            ->get('IndicatedPointTag')->result_array();
        return (empty($res))? null: $res[0];
    }


    public function get_list($user_id, $name,
        $begin_created_date, $end_created_date,
        $begin_updated_date, $end_updated_date)
    {
        if (! $user_id)
        {
            return array();
        }

        $this->db
            ->where('user_id', $user_id)
            ->where('is_deleted', 0);

        if ($name !== "")
        {
            $this->db->like('indicated_point_tag_name', $name);
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
            $this->db->where('updated_date < ', get_next_date_str($end_updated_date));
        }

        return $this->db->get('IndicatedPointTag')->result_array();
    }
}