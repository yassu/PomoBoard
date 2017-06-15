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


    public function update($user_id, $indicated_point_id, $title, $memo)
    {
        $this->db
            ->where(
                array(
                    'user_id' => $user_id,
                    'is_deleted' => 0,
                    'indicated_point_id' => $indicated_point_id
                )
            )
            ->update('IndicatedPoint', array(
                'title' => $title,
                'memo' => $memo,
                'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            ));
    }


    public function delete($user_id, $indicated_point_id)
    {
        $this->db
            ->where(array(
                'user_id' => $user_id,
                'indicated_point_id' => $indicated_point_id
            ))
            ->update(
                'IndicatedPoint',
                array(
                    'is_deleted' => 1,
                    'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
                )
            );
    }


    public function get_by_indicated_point_id($user_id, $indicated_point_id)
    {
        $res = $this->db
            ->where('user_id', $user_id)
            ->where('is_deleted', 0)
            ->where('indicated_point_id', $indicated_point_id)
            ->get('IndicatedPoint')->result_array();

        return (empty($res))? null: $res[0];
    }


    public function get_list($user_id, $title, $memo, $keyword,
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

        if ($title !== "")
        {
            $this->db->like('title', $title);
        }

        if ($memo !== "")
        {
            $this->db->like('memo', $memo);
        }

        if ($keyword !== "")
        {
            $this->db
                ->group_start()
                ->like('title', $keyword)
                ->or_like('memo', $keyword)
                ->group_end();
        }

        if ($begin_created_date !== "")
        {
            $this->db->where('created_date >= ', $begin_created_date);
        }

        if ($end_created_date !== "")
        {
            $this->db->where('created_date <= ', get_next_date_str($end_created_date));
        }

        if ($begin_updated_date !== "")
        {
            $this->db->where('updated_date >= ', $begin_updated_date);
        }

        if ($end_updated_date !== "")
        {
            $this->db->where('updated_date < ', get_next_date_str($end_updated_date));
        }

        return $this->db->get('IndicatedPoint')->result_array();
    }
}