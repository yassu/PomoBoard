<?php
class User extends CI_Controller
{
        public function sign_up()
        {
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->model('MY_User', 'User');
                $this->load->library('form_validation');


                $header_data['page_title'] = 'SignUp | TaskBoard';

                $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[12]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[60]');
                $this->form_validation->set_rules('confirmed_password', 'Confirmation password', 'trim|required|matches[password]');

                if ($this->form_validation->run() == False)
                {
                        $this->load->view('statics/header', $header_data);
                        $this->load->view('user/sign_up');
                        $this->load->view('statics/footer');
                }
                else
                {
                        $name = $_POST['name'];
                        $hashed_password = crypt($_POST['password'], "$6$");
                        $data = array(
                                'name' => $name
                        );

                        $this->User->insert($name, $hashed_password);

                        $this->load->view('statics/header', $header_data);
                        $this->load->view('user/sign_up_success', $data);
                        $this->load->view('statics/footer');
                }
        }

        public function sign_in()
        {
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->library('form_validation');


                $this->form_validation->set_rules('id', 'Id', 'trim|required|min_length[6]|max_length[12]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[60]');

                if ($this->form_validation->run() === FALSE)
                {
                        $header_data['page_title'] = 'SignIn | TaskBoard';
                        $this->load->view('statics/header', $header_data);
                        $this->load->view('user/sign_in');
                        $this->load->view('statics/footer');
                }
                else
                {
                        // ユーザー情報をglobal sessionに保存する
                        $header_data['page_title'] = 'Home | TaskBoard';
                        $this->load->view('statics/header', $header_data);
                        $this->load->view('taskboard');
                        $this->load->view('statics/footer');
                }
        }
}