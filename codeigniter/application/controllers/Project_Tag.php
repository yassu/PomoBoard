<?php
class Project_Tag extends CI_Controller {

        public function explore()
        {
                $header_data['page_title'] = 'ProjectTagExplore | PomoBoard';
                $header_data['headline'] = 'ProjectTag Explore';

                $data['list'] = (array_key_exists('submit', $_POST ) && $_POST['submit'] === 'explore')?
                        $this->ProjectTag->get_list(
                                $this->User->logined(), $_POST['project_tag_name'], $_POST['begin_created_date'], $_POST['end_created_date'],
                                $_POST['begin_updated_date'], $_POST['end_updated_date'])
                                : array();

                $this->load->view('statics/header', $header_data);
                $this->load->view('project_tag/explore', $data);
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


        public function delete($project_tag_id)
        {
                $this->ProjectTag->delete($this->User->logined(), $project_tag_id);
                set_flash_message($this, 'Deleted the project tag.');

                redirect(site_url('project_tag/explore'));
        }
}