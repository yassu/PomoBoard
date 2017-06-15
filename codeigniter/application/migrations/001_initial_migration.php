<?php
class Migration_Initial_migration extends CI_Migration
{

    public function __construct()
    {   
        parent::__construct();
    }

    // アップデート処理
    public function up()
    {
        // Create User Table
        $this->dbforge->add_field(
            array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true
            ),
            'user_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 64
            ),
            'user_hashed_pass' => array(
                'type' => 'VARCHAR',
                'constraint' => 256
            ),
            'created_date' => array(
                'type' => 'DATETIME'
            ),
            'updated_date' => array(
                'type' => 'DATETIME'
            )
            )
        );
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('User');

        // Create Task Table
        $this->dbforge->add_field(
            array(
            'task_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true
            ),
            'user_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 64
            ),
            'title' => array(
                'type' => 'TEXT'
            ),
            'memo' => array(
                'type' => 'TEXT'
            ),
            'created_date' => array(
                'type' => 'DATETIME'
            ),
            'updated_date' => array(
                'type' => 'DATETIME'
            ),
            'is_deleted' => array (
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 0
            )   

            )
        );
        $this->dbforge->add_key('task_id', true);
        $this->dbforge->create_table('Task');
    }


    // ロールバック処理
    public function down()
    {   
        $this->dbforge->drop_table('User');
        $this->dbforge->drop_table('Task');
    }
}