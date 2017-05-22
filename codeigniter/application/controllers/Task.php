<?php
class Task extends CI_Controller {

        public function explore()
        {
                $this->load->helper('url');

                $this->load->view('statics/header');
                $this->load->view('task/explore');
                $this->load->view('statics/footer');
        }
}