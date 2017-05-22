<?php
class TaskBoard extends CI_Controller {

        public function index()
        {
                $this->load->helper('url');

                $this->load->view('statics/header');
                $this->load->view('taskboard');
                $this->load->view('statics/footer');
        }
}