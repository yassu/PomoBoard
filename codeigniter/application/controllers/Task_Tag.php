<?php
class Task_Tag extends CI_Controller
{

    public function explore()
    {
        $header_data['page_title'] = 'TaskTagExplore | PomoBoard';
        $header_data['headline'] = 'TaskTag Explore';

        if (array_key_exists('submit', $_POST) && $_POST['submit'] === "explore") {
            $list = $this->TaskTag->get_list($this->User->logined(), $_POST['name'], $_POST['begin_created_date'], $_POST['end_created_date'], $_POST['begin_updated_date'], $_POST['end_updated_date']);
        }
        else
        {
            $list = array();
        }

        $data = array('list' => $list);

        $this->load->view('statics/header', $header_data);
        $this->load->view('task_tag/explore', $data);
        $this->load->view('statics/footer');
    }


    public function edit($task_tag_id)
    {
        $header_data['page_title'] = 'New Project Tag | PomoBoard';
        $header_data['headline'] = 'New Project Tag';

        $data = array();
        $task_tag = ($task_tag_id === "new")? null: $this->TaskTag->get_task_tag_from_task_tag_id($this->User->logined(), $task_tag_id);
        $data['task_tag'] = $task_tag;
        $data['task_tag_id'] = $task_tag_id;

        $this->form_validation->set_rules('task_tag_name', 'Task Tag name', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('statics/header', $header_data);
            $this->load->view('task_tag/edit', $data);
            $this->load->view('statics/footer');
        }
        else
        {
            if ($task_tag_id === "new") {
                $this->TaskTag->insert($this->User->logined(), $_POST['task_tag_name']);
                set_flash_message('Inserted new task tag.');
            }
            else
            {
                $this->TaskTag->update($this->User->logined(), intval($task_tag_id), $_POST['task_tag_name']);
                set_flash_message('Updated the task tag.');
            }
            redirect('task_tag/explore');
        }
    }


    public function delete($task_tag_id)
    {
        $this->TaskTag->delete($this->User->logined(), intval($task_tag_id));
        set_flash_message('Deleted the task tag');

        redirect(site_url('task_tag/explore'));
    }
}
