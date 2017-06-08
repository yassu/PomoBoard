<?php
class Migration_Null_constraints_to_task_project_id extends CI_Migration {

    public function __construct()
    {   
        parent::__construct();
    }


    public function up()
    {
        $this->dbforge->modify_column(
            'Task',
            array(
                'project_id' => array(
                    'type' => 'INT',
                    'constraint' => 10,
                    'null' => FALSE
                )
            )
        );
    }


    public function down()
    {
        $this->dbforge->modify_column(
            'Task',
            array(
                'project_id' => array(
                    'type' => 'INT',
                    'constraint' => 10
                )
            )
        );

    }
}