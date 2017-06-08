<?php
class Task extends CI_Controller {

        public function explore()
        {
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->helper('common');
                $this->load->model('MY_User', 'User');
                $this->load->model('MY_Task', 'Task');                

                $header_data['page_title'] = 'Explore | PomoBoard';

                // echo var_dump($_REQUEST);
                if (array_key_exists('task_id', $_REQUEST))
                {
                        $this->Task->remove($this->User->logined(), intval($_REQUEST['task_id']));
                        echo "Deleted Task";
                }

                $data['list'] = array_key_exists('title', $_POST)?
                        $this->Task->get_list($this->User->logined(), $_POST['title'], $_POST['memo'], $_POST['keyword']): array();

                $this->load->view('statics/header', $header_data);
                $this->load->view('task/explore', $data);
                $this->load->view('statics/footer');
        }

        public function create()
        {
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->model('MY_User', 'User');
                $this->load->library('form_validation');

                $this->form_validation->set_rules('task_title', 'Task Title', 'trim|required');
                $this->form_validation->set_rules('task_memo', 'Task Name', 'trim');

                if ($this->form_validation->run() == False)
                {
                        $header_data['page_title'] = 'Create | PomoBoard';
                        
                        $this->load->view('statics/header', $header_data);
                        $this->load->view('task/create');
                        $this->load->view('statics/footer');
                }
                else
                {
                        $this->load->model('MY_Task', 'Task');

                        $header_data['page_title'] = 'Create | PomoBoard';

                        $user_id = $this->User->logined();
                        $title = $_POST['task_title'];
                        $memo = $_POST['task_memo'];

                        $this->Task->insert($user_id, $title, $memo);

                        $this->load->view('statics/header', $header_data);
                        $this->load->view('task/explore');
                        $this->load->view('statics/footer');
                }
        }

        
        public function edit($task_id)
        {
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('MY_User', 'User');
                $this->load->model('MY_Task', 'Task');
                $this->load->model('MY_Project', 'Project');

                $this->form_validation->set_rules('task_title', 'Task Title', 'trim|required');
                $this->form_validation->set_rules('task_memo', 'Task Name', 'trim');
                $this->form_validation->set_rules('project_id', 'Project Id', 'trim|required');

                $task = $this->Task->get_task_from_task_id($this->User->logined(), $task_id);

                if ($this->form_validation->run() == False)
                {
                        $data = array(
                                'task' => $task,
                                'projects' => $this->Project->get_all($this->User->logined())
                        );
                        $header_data['page_title'] = 'Edit | PomoBoard';

                        $this->load->view('statics/header', $header_data);
                        $this->load->view('task/edit', $data);
                        $this->load->view('statics/footer');
                }
                else
                {
                        $this->Task->update($this->User->logined(), intval($task['task_id']), $_POST['task_title'], $_POST['task_memo'], $_POST['project_id']);
                        redirect('task/explore');
                }
        }


        public function remove($task_id)
        {
                $this->load->helper('url');
                $this->load->model('MY_User', 'User');
                $this->load->model('MY_Task', 'Task');

                $this->Task->remove($this->User->logined(), $task_id);

                redirect(site_url('task/explore'));
        }
}