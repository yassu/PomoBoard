<?php
class PomoBoard extends CI_Controller {

        public function index()
        {
                $header_data['page_title'] = 'Home | PomoBoard';
                $header_data['headline'] = 'PomoBoard';

                $this->load->view('statics/header', $header_data);
                $this->load->view('pomoboard');
                $this->load->view('statics/footer');
        }
}
