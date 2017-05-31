<?php
class Task extends CI_Controller {

        public function explore()
        {
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->model('MY_User', 'User');
                $this->load->model('MY_Task', 'Task');

                $header_data['page_title'] = 'Explore | TaskBoard';

                if (array_key_exists('title', $_POST))
                {
                        $list = $this->Task->explore($this->User->logined(), $_POST['title'], $_POST['memo'], $_POST['keyword']);
                }

                $this->load->view('statics/header', $header_data);
                $this->load->view('task/explore');
                echo var_dump($_POST);
                echo var_dump($_GET);
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
                        $header_data['page_title'] = 'Create | TaskBoard';
                        
                        $this->load->view('statics/header', $header_data);
                        $this->load->view('task/create');
                        $this->load->view('statics/footer');
                }
                else
                {
                        $this->load->model('MY_Task', 'Task');

                        $header_data['page_title'] = 'Create | TaskBoard';

                        $user_id = $this->User->logined();
                        $title = $_POST['task_title'];
                        $memo = $_POST['task_memo'];

                        $this->Task->insert($user_id, $title, $memo);

                        $this->load->view('statics/header', $header_data);
                        $this->load->view('task/explore');
                        $this->load->view('statics/footer');
                }
        }
}