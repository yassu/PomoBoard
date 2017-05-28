<?php
class User extends CI_Controller
{
        public function sign_up()
        {
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->library('form_validation');


                $header_data['page_title'] = 'SignUp | TaskBoard';

                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirmed_password', 'Confirmation password', 'required');

                if ($this->form_validation->run() == False)
                {
                        $this->load->view('statics/header', $header_data);
                        echo "First Time or Error";
                        $this->load->view('user/sign_up');
                        $this->load->view('statics/footer');
                }
                else
                {
                        $this->load->view('statics/header', $header_data);
                        echo "Success";
                        $this->load->view('user/sign_up');
                        $this->load->view('statics/footer');
                }
        }
}