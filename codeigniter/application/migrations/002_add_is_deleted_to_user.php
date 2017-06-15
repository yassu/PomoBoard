<?php
class Migration_Add_is_deleted_to_user extends CI_Migration
{

    public function __construct()
    {   
        parent::__construct();
    }

    // アップデート処理
    public function up()
    {
        $fields = array(
            'is_deleted' => array (
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 0
            )   
        );  
        $this->dbforge->add_column('User', $fields);
    }   

    // ロールバック処理
    public function down()
    {   
        $this->dbforge->drop_column('User', 'is_deleted');
    }
}