<?php
class Migration_Add_project_table_and_id extends CI_Migration {

    public function __construct()
    {   
        parent::__construct();
    }


    public function up()
    {
        // Add project_id key to Task table
        $this->dbforge->add_column(
            'Task',
            array(
                'project_id' => array(
                    'type' => 'INT',
                    'constraint' => 10
                )
            )
        );

        // Create Project table
        $this->dbforge->add_field(array(
            'project_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 64
            ),
            'project_name' => array(
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
        ));
        $this->dbforge->add_key('project_id', TRUE);
        $this->dbforge->create_table('Project');
    }


    public function down()
    {
        $this->dbforge->drop_column('Task', 'project_id');
        $this->dbforge->drop_table('Project');
    }
}