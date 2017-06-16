<?php
class Indicated_Point_Tag extends CI_Controller
{

    public function explore()
    {
        $header_data['page_title'] = 'IndicatedPointTag | PomoBoard';
        $header_data['headline'] = 'IndicatedPointTag Expore';

        $this->load->view('statics/header', $header_data);
        $this->load->view('indicated_point_tag/explore');
        $this->load->view('statics/footer');
    }


    public function edit()
    {
        $this->form_validation->set_rules('indicated_point_tag_name', 'Indicated Point Tag name', 'trim|required');

        $header_data['page_title'] = 'New IndicatedPointTag | PomoBoard';
        $header_data['headline'] = 'New Indicated Point Tag';

        if ($this->form_validation->run() === false)
        {
            $this->load->view('statics/header', $header_data);
            $this->load->view('indicated_point_tag/edit');
            $this->load->view('statics/footer');
        }
        else
        {
            $this->IndicatedPointTag->insert($this->User->logined(), $_POST['indicated_point_tag_name']);
            set_flash_message($this, 'Inserted new indicated point tag');
            redirect('indicated_point_tag/explore');
        }
    }
}