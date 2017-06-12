<?php
class Project_Tag extends CI_Controller {

        public function explore()
        {
                $header_data['page_title'] = 'ProjectTagExplore | PomoBoard';
                $header_data['headline'] = 'ProjectTag Explore';

                $this->load->view('statics/header', $header_data);
                $this->load->view('project_tag/explore');
                $this->load->view('statics/footer');
        }

        
        public function edit($project_tag_id)
        {
                // とりあえずproject_tag_id === newの場合だけ
                $this->form_validation->set_rules('project_tag_name', 'Project Tag name', 'trim|required');

                if ($this->form_validation->run() == False)
                {
                        $header_data['page_title'] = 'Edit Project Tag | Pomodoro';
                        $header_data['headline'] = "New Project Tag";

                        $this->load->view('statics/header', $header_data);
                        $this->load->view('project_tag/edit');
                        $this->load->view('statics/footer');
                }
                else
                {
                        $this->ProjectTag->insert($this->User->logined(), $_POST['project_tag_name']);
                        set_flash_message($this, 'Inserted new project tag.');
                        echo var_dump($_POST);
                        redirect('project_tag/explore');
                }
        }
}