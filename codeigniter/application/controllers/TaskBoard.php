<?php
class TaskBoard extends CI_Controller {

        public function index()
        {
                $this->load->helper('url');

                $header_data['page_title'] = 'Home | TaskBoard';

                $this->load->view('statics/header', $header_data);
                $this->load->view('taskboard');
                $this->load->view('statics/footer');
        }
}