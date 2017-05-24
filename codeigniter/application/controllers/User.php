<?php
class User extends CI_Controller
{
        public function sign_up()
        {
                $this->load->helper('form');
                $this->load->helper('url');

                $header_data['page_title'] = 'SignUp | TaskBoard';

                $this->load->view('statics/header', $header_data);
                $this->load->view('user/sign_up');
                $this->load->view('statics/footer');
        }
}