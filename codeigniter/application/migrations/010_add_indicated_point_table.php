<?php
class Migration_Add_Indicated_Point_Table extends CI_Migration
{

    public function __construct()
    {   
        parent::__construct();
    }


    public function up()
    {
        // Create Project table
        $this->dbforge->add_field(
                array(
                'indicated_point_id' => array(
                    'type' => 'INT',
                    'constraint' => 10,
                    'auto_increment' => true
                ),
                'user_id' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 64
                ),
                'title' => array(
                    'type' => 'TEXT',
                ),
                'memo' => array(
                    'type' => 'TEXT',
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
        $this->dbforge->add_key('indicated_point_id', true);
        $this->dbforge->create_table('IndicatedPoint');
    }


    public function down()
    {
        $this->dbforge->drop_table('IndicatedPoint');
    }
}