<?php
class Migration_Add_user_id_key_to_task_tag_table extends CI_Migration
{

    public function __construct()
    {   
        parent::__construct();
    }


    public function up()
    {
        $this->dbforge->add_column(
            'TaskTag',
            array(
                'user_id' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 64
                )
            )
        );
    }


    public function down()
    {
        $this->dbforge->drop_column('TaskTag', 'user_id');
    }
}