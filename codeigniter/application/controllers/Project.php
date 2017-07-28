<?php
class Project extends CI_Controller
{

    public function explore()
    {
        $data = array();
        $data['list'] = (array_key_exists('submit', $_POST) && $_POST['submit'] === 'explore')?
                                                $this->Project->get_list(
                                                    $this->User->logined(), $_POST['name'],
                                                    $_POST['begin_created_date'], $_POST['end_created_date'],
                                                    $_POST['begin_updated_date'], $_POST['end_updated_date']
                                                )
                                                        : array();

        $header_data['page_title'] = 'ProjectExplore | PomoBoard';
        $header_data['headline'] = 'Project Explore';

        $this->load->view('statics/header', $header_data);
        $this->load->view('project/explore', $data);
        $this->load->view('statics/footer');
    }


        // project_id: str
        // number of Project.project_id or "new"
    public function edit($project_id)
    {
        $this->form_validation->set_rules('project_name', 'Project name', 'trim|required');

        // echo var_dump($_POST);

        if ($this->form_validation->run() == false) {
                $header_data['page_title'] = 'NewProject | PomoBoard';
                $header_data['headline'] = 'Edit Project';

                $this->load->view('statics/header', $header_data);
                $data = array(
                        'project' => $this->Project->get_project($this->User->logined(), $project_id)
                );
                $this->load->view('project/edit', $data);
                $this->load->view('statics/footer');
        }
        else
        {
            $project_tag_ids = array();
            if ($_POST["project_tag_id1"] != "")
            {
                array_push($project_tag_ids, $_POST["project_tag_id1"]);
            }
            if ($_POST["project_tag_id2"] != "")
            {
                array_push($project_tag_ids, $_POST["project_tag_id2"]);
            }
            if ($_POST["project_tag_id3"] != "")
            {
                array_push($project_tag_ids, $_POST["project_tag_id3"]);
            }
            if ($_POST["project_tag_id4"] != "")
            {
                array_push($project_tag_ids, $_POST["project_tag_id4"]);
            }
            if ($_POST["project_tag_id5"] != "")
            {
                array_push($project_tag_ids, $_POST["project_tag_id5"]);
            }

            foreach($_POST as $order => $project_tag_id)
            {
                    if (substr($order, 0, strlen("project_tag_id")) === "project_tag_id" && $project_tag_id !== "")
                    {
                            $tag_id = intval(substr($order, strlen("project_tag_id")));
                            $this->ProjectDetail->insert();
                    }
            }

            $inserted_id = null;
            if ($project_id === "new" ) {
                    $inserted_id = $this->Project->insert($this->User->logined(), $_POST['project_name']);

                foreach($_POST as $order => $project_tag_id)
                    {
                    if (substr($order, 0, strlen("project_tag_id")) === "project_tag_id" && $project_tag_id !== "") {
                        $project_tag_id = intval(substr($order, strlen("project_tag_id")));
                        $this->ProjectDetail->insert($this->User->logined(), $inserted_id, $project_tag_id);
                    }
                }

                    set_flash_message('Inserted new Project.');
            }
            else
            {
                    $updated_id = $this->Project->update($this->User->logined(), intval($project_id), $_POST['project_name']);
                    $project_tag_ids = array();
                foreach ($_POST as $key => $project_tag_id)
                    {
                    if (substr($key, 0, strlen("project_tag_id")) === "project_tag_id") {
                        array_push($project_tag_ids, intval($project_tag_id));
                    }
                }
                    $this->ProjectDetail->update_by_project_id($this->User->logined(), $updated_id, $project_tag_ids);
                    set_flash_message('Updated the Project.');
            }

            // redirect('project/explore');
        }
    }

    public function delete($project_id)
    {
        $this->Project->delete($this->User->logined(), $project_id);
        set_flash_message('Deleted the Project.');

        redirect('project/explore');
    }
}
