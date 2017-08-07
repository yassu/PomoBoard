<?php
class Migration_Add_task_detail_table extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
    }


    public function up()
    {
        $this->dbforge->add_field(
            array(
            'task_detail_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true
            ),
            'user_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 64
            ),
            'task_id' => array(
                'type' => 'INT',
                'constraint' => 10
            ),
            'task_tag_id' => array(
                'type' => 'INT',
                'constraint' => 10
            ),
            'created_date' => array(
                'type' => 'DATETIME'
            ),
            'updated_date' => array(
                'type' => 'DATETIME'
            ),
            'is_deleted' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 0
            )
            )
        );
        $this->dbforge->add_key('task_detail_id', true);
        $this->dbforge->create_table('TaskDetail');
    }


    public function down()
    {
        $this->dbforge->drop_table('TaskDetail');
    }
}
