<?php
class PomoBoard extends CI_Controller {

        public function index()
        {
                $this->load->helper('url');
                $this->load->model('MY_User', 'User');

                $header_data['page_title'] = 'Home | PomoBoard';

                $this->load->view('statics/header', $header_data);
                $this->load->view('pomoboard');
                $this->load->view('statics/footer');
        }
}
