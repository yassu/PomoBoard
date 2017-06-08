<?php
class Migration_Add_unique_keys extends CI_Migration {

    public function __construct()
    {   
        parent::__construct();
    }


    public function up()
    {
        $this->dbforge->modify_column(
            'User',
            array(
                'user_id' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 64,
                    'unique' => TRUE
                )
            )
        );
    }


    public function down()
    {
        $this->dbforge->modify_column(
            'User',
            array(
                'user_id' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 64,
                )
            )
        );
    }
}