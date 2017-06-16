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
        $header_data['page_title'] = 'New IndicatedPointTag | PomoBoard';
        $header_data['headline'] = 'New Indicated Point Tag';

        $this->load->view('statics/header', $header_data);
        $this->load->view('indicated_point_tag/edit');
        $this->load->view('statics/footer');
    }
}