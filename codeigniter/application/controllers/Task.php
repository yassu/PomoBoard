<?php
class Task extends CI_Controller {

        public function explore()
        {
                $this->load->helper('url');
                $this->load->model('MY_User', 'User');

                $header_data['page_title'] = 'Explore | TaskBoard';

                $this->load->view('statics/header', $header_data);
                $this->load->view('task/explore');
                $this->load->view('statics/footer');
        }

        public function create()
        {
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->model('MY_User', 'User');
                $this->load->library('form_validation');

                $header_data['page_title'] = 'Create | TaskBoard';

                $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
                $this->form_validation->set_rules('task_memo', 'Task Name', 'trim');
                $this->form_validation->run();

                $this->load->view('statics/header', $header_data);
                $this->load->view('task/create');
                $this->load->view('statics/footer');
        }
}