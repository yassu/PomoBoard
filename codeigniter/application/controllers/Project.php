<?php
class Project extends CI_Controller {

        public function explore()
        {
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->helper('common');
                $this->load->model('MY_User', 'User');
                $this->load->model('MY_Task', 'Task');

                $header_data['page_title'] = 'ProjectExplore | PomoBoard';

                $this->load->view('statics/header', $header_data);
                $this->load->view('project/explore');
                $this->load->view('statics/footer');
        }


        // project_id: str
        // number of Project.project_id or "new"
        public function edit($project_id)
        {
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('MY_User', 'User');
            $this->load->model('MY_Project', 'Project');

            $this->form_validation->set_rules('project_name', 'Project name', 'trim|required');

            echo var_dump($_POST);

            // とりあえず New Projectの場合

            if ($this->form_validation->run() == False)
            {
                    $header_data['page_title'] = 'NewProject | PomoBoard';
                    
                    $this->load->view('statics/header', $header_data);
                    $this->load->view('project/edit');
                    $this->load->view('statics/footer');
            }
            else
            {
                $this->Project->insert($this->User->logined(), $_POST['project_name']);
                redirect('project/explore');
            }
        }
}
