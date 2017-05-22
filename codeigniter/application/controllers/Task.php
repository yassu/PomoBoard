<?php
class Task extends CI_Controller {

        public function explore()
        {
                $this->load->helper('url');

                $header_data['page_title'] = 'Explore | TaskBoard';

                $this->load->view('statics/header', $header_data);
                $this->load->view('task/explore');
                $this->load->view('statics/footer');
        }
}