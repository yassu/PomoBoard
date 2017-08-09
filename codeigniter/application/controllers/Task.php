<?php
class Task extends CI_Controller
{

    public function explore()
    {
        $header_data['page_title'] = 'Explore | PomoBoard';
        $header_data['headline'] = 'Task Board';

        // echo var_dump($_REQUEST);
        if (array_key_exists('task_id', $_REQUEST)) {
            $this->Task->remove($this->User->logined(), intval($_REQUEST['task_id']));
        }

        $data['list'] = (array_key_exists('submit', $_POST) && $_POST['submit'] === 'explore')?
                $this->Task->get_list(
                    $this->User->logined(), $_POST['title'], $_POST['memo'], $_POST['keyword'],
                    $_POST['begin_created_date'], $_POST['end_created_date'],
                    $_POST['begin_updated_date'], $_POST['end_updated_date']
                )
                                : array();

        $this->load->view('statics/header', $header_data);
        $this->load->view('task/explore', $data);
        $this->load->view('statics/footer');
    }


    public function edit($task_id)
    {
        $this->form_validation->set_rules('task_title', 'Task Title', 'trim|required');
        $this->form_validation->set_rules('task_memo', 'Task Name', 'trim');
        $this->form_validation->set_rules('project_id', 'Project Id', 'trim|required');

        $task = ($task_id === 'new')? null: $this->Task->get_task_from_task_id($this->User->logined(), $task_id);

        if ($this->form_validation->run() == false) {
            $data = array(
                    'task' => $task,
                    'projects' => $this->Project->get_all($this->User->logined())
            );

            $type = ($task_id === 'new')? 'New': 'Edit';
            $header_data['page_title'] = $type.' Task | PomoBoard';
            $header_data['headline'] = ($task === null)? "New Task": "Edit Task";

            $this->load->view('statics/header', $header_data);
            $this->load->view('task/edit', $data);
            $this->load->view('statics/footer');
        }
        else
        {
            $task_tag_ids = array();
            if ($_POST['task_tag_id1'] !== "")
            {
                array_push($task_tag_ids, $_POST['task_tag_id1']);
            }
            if ($_POST['task_tag_id2'] !== "")
            {
                array_push($task_tag_ids, $_POST['task_tag_id2']);
            }
            if ($_POST['task_tag_id3'] !== "")
            {
                array_push($task_tag_ids, $_POST['task_tag_id3']);
            }
            if ($_POST['task_tag_id4'] !== "")
            {
                array_push($task_tag_ids, $_POST['task_tag_id4']);
            }
            if ($_POST['task_tag_id5'] !== "")
            {
                array_push($task_tag_ids, $_POST['task_tag_id5']);
            }

            if ($task_id !== "new")
            {
                $this->TaskDetail->delete_from_id(
                    $this->User->logined(),
                    $task_id
                );
                foreach($task_tag_ids as $task_tag_id)
                {
                    $tag_id = intval($task_tag_id);
                    $this->TaskDetail->insert(
                        $this->User->logined(),
                        $task_id,
                        $tag_id
                    );
                }
            }

            if ($task_id === 'new') {
                $this->Task->insert($this->User->logined(), $_POST['task_title'], $_POST['task_memo'], $_POST['project_id']);
                set_flash_message('Inserted new task.');
            }
            else
            {
                $this->Task->update($this->User->logined(), intval($task['task_id']), $_POST['task_title'], $_POST['task_memo'], $_POST['project_id']);
                set_flash_message('Updated the task.');
            }
            redirect('task/explore');
        }
    }


    public function delete($task_id)
    {
        $this->Task->delete($this->User->logined(), $task_id);
        set_flash_message('Deleted the task.');

        redirect(site_url('task/explore'));
    }
}
