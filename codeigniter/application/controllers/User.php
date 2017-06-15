<?php
class User extends CI_Controller
{
    public function sign_up()
    {
        $header_data['page_title'] = 'SignUp | PomoBoard';

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[12]|callback_duplication_user_id_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[60]');
        $this->form_validation->set_rules('confirmed_password', 'Confirmation password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == false) {
            $header_data['headline'] = 'Sign Up';
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
            $header_data['headline'] = 'Sign Up is successed.';

            $this->User->insert($name, $hashed_password);

            set_flash_message($this, 'Success in signing up');

            $this->load->view('statics/header', $header_data);
            $this->load->view('user/sign_up_success', $data);
            $this->load->view('statics/footer');
        }
    }

    public function duplication_user_id_check($user_id)
    {
        if ($this->User->exists($user_id)) {
            $this->form_validation->set_message(
                'duplication_user_id_check',
                sprintf('There is a User whose id is %s. Please select other id.', $user_id)
            );
            return false;
        }
        else
        {
            return true;
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('id', 'Id', 'trim|required|min_length[6]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[60]');

        if ($this->form_validation->run() === false) {
            $header_data['page_title'] = 'SignIn | PomoBoard';
            $header_data['headline'] = 'Login';
            $this->load->view('statics/header', $header_data);
            $this->load->view('user/login');
            $this->load->view('statics/footer');
        }
        else
        {
            $user_id = $_POST['id'];
            $password = crypt($_POST['password'], "$6$");

            if($this->User->authorize($user_id, $password))      // case: correct user_id and password is entered
            {
                $this->session->user_id = $_POST['id'];
                $this->session->hashed_password = crypt($_POST['password'], "$6$");
                set_flash_message($this, 'Login is successed.');
                redirect('pomoboard');
            }
            else
            {
                set_flash_message($this, 'User id and password combination is invalid.');
                redirect('user/login');
            }
        }
    }


    public function logout()
    {
        $this->User->logout();

        redirect('');
    }
}
