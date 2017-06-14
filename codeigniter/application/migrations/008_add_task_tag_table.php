<?php
class Migration_Add_task_tag_table extends CI_Migration {

    public function __construct()
    {   
        parent::__construct();
    }


    public function up()
    {
        $this->dbforge->add_field(array(
                'task_tag_id' => array(
                    'type' => 'INT',
                    'constraint' => 10,
                    'auto_increment' => TRUE
                ),
                'task_tag_name' => array(
                    'type' => 'TEXT'
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
        $this->dbforge->add_key('task_tag_id', TRUE);
        $this->dbforge->create_table('TaskTag');
    }


    public function down()
    {
        $this->dbforge->drop_table('TaskTag');
    }
}