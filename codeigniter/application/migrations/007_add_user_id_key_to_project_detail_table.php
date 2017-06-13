<?php
class Migration_Add_user_id_key_to_project_detail_table extends CI_Migration {

    public function __construct()
    {   
        parent::__construct();
    }


    public function up()
    {
        echo "update table";
        $this->dbforge->add_field(array(
            'project_detail_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => TRUE
            ),
            'user_id' => array(    
                'type' => 'VARCHAR',
                'constraint' => 64
            ),
            'project_id' => array(
                'type' => 'INT',
                'constraint' => 10
            ),
            'project_tag_id' => array(
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
        ));
        $this->dbforge->add_key('project_detail_id', TRUE);
        $this->dbforge->create_table('ProjectDetail');
    }


    public function down()
    {
        $this->dbforge->drop_table('ProjectDetail');
    }
}