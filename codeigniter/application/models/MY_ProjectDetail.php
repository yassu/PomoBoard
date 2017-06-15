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
            'created_date' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_date' => (new DateTime())->format('Y-m-d H:i:s')
            )
        );
        return $this->db->insert_id();
    }


    public function update_by_project_id($user_id, $updated_project_id, $project_tag_ids)
    {
        // 作成, 削除されるレコード一覧を取得する
        // sql上の対象のデータを取得する
        $details_at_sql_tmp = $this->db
            ->where('user_id', $user_id)
            ->where('is_deleted', 0)
            ->get('ProjectDetail')->result_array();
        $details_at_sql = array();
        foreach($details_at_sql_tmp as $details_record)
        {
            array_push($details_at_sql, $details_record['project_tag_id']);
        }
        // 対象となるProjectDetailのidのうちproject_tag_idsに含まれているが sql上にはないレコード(作成するレコード)を取得する
        $created_tags = array();
        foreach($project_tag_ids as $project_tag_id)
        {
            if (! in_array($project_tag_id, $details_at_sql)) {
                array_push($created_tags, $project_tag_id);
            }
        }
        echo var_dump($created_tags);
        // 対象となるProjectDetialのidのうちsql上にはあるがproject_tag_idsに含まれていないレコード(削除するレコード)を取得する

        // 作成されるべきレコードを作成する
        // 削除すべきレコードを論理削除する
    }
}