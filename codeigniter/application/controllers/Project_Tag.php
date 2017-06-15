<?php
class Project_Tag extends CI_Controller
{

    public function explore()
    {
        $header_data['page_title'] = 'ProjectTagExplore | PomoBoard';
        $header_data['headline'] = 'ProjectTag Explore';

        $data['list'] = (array_key_exists('submit', $_POST) && $_POST['submit'] === 'explore')?
                $this->ProjectTag->get_list(
                    $this->User->logined(), $_POST['project_tag_name'], $_POST['begin_created_date'], $_POST['end_created_date'],
                    $_POST['begin_updated_date'], $_POST['end_updated_date']
                )
                        : array();

        $this->load->view('statics/header', $header_data);
        $this->load->view('project_tag/explore', $data);
        $this->load->view('statics/footer');
    }

        
    public function edit($project_tag_id)
    {
        // とりあえずproject_tag_id === newの場合だけ
        $this->form_validation->set_rules('project_tag_name', 'Project Tag name', 'trim|required');

        if ($this->form_validation->run() == false) {
            $type = ($project_tag_id === "new")? "New": "Edit";
            $header_data['page_title'] = $type . ' Project Tag | Pomodoro';
            $header_data['headline'] = $type . " Project Tag";

            $project_tag = ($project_tag_id === "new")?
                    null: $this->ProjectTag->get_project_tag_from_project_tag_id($this->User->logined(), $project_tag_id);
            $data = array(
                    'project_tag' => $project_tag
            );

            $this->load->view('statics/header', $header_data);
            $this->load->view('project_tag/edit', $data);
            $this->load->view('statics/footer');
        }
        else
        {
            if ($project_tag_id === "new") {
                $this->ProjectTag->insert($this->User->logined(), $_POST['project_tag_name']);
                set_flash_message($this, 'Inserted new project tag.');
            }
            else
            {
                $this->ProjectTag->update($this->User->logined(), intval($project_tag_id), $_POST['project_tag_name']);
                set_flash_message($this, 'Updated new project tag.');
            }
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