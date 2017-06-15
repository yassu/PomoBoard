<?php
class Indicated_Point extends CI_Controller
{

    public function explore()
    {
        $header_data['page_title'] = 'IndicatedPoint | Pomoboard';
        $header_data['headline'] = 'Explore Indicated Point';

        // echo var_dump($_POST);
        echo var_dump($_POST);
        if (array_key_exists('submit', $_POST) && $_POST['submit'] === 'explore')
        {
            echo "get_list";
            $list = $this->IndicatedPoint->get_list($this->User->logined(),
                $_POST['title'], $_POST['memo'], $_POST['keyword'],
                $_POST['begin_created_date'], $_POST['end_created_date'],
                $_POST['begin_updated_date'], $_POST['end_updated_date']);
        }
        else
        {
            $list = array();
        }
        echo var_dump($list);

        $this->load->view('statics/header', $header_data);
        $this->load->view('indicated_point/explore');
        $this->load->view('statics/footer');
    }


    public function edit($indicated_point_id)
    {
        $this->form_validation->set_rules('indicated_point_title', 'Indicated Point Title', 'trim|required');
        $this->form_validation->set_rules('indicated_point_memo', 'Indicated Point Memo', 'trim');

        $header_data['page_title'] = 'New Indicated Point | PomoBoard';
        $header_data['headline'] = 'New Indicated Point';

        echo var_dump($_POST);

        if ($this->form_validation->run() == false)
        {
            $this->load->view('statics/header', $header_data);
            $this->load->view('indicated_point/edit');
            $this->load->view('statics/footer');
        }
        else
        {
            $this->IndicatedPoint->insert($this->User->logined(),
                $_POST['indicated_point_title'], $_POST['indicated_point_memo']);
            set_flash_message($this, 'Inserted the indicated point.');
            redirect('indicated_point/explore');
        }
    }
}