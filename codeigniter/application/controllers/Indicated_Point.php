<?php
class Indicated_Point extends CI_Controller
{

    public function explore()
    {
        $header_data['page_title'] = 'IndicatedPoint | Pomoboard';
        $header_data['headline'] = 'Explore Indicated Point';

        $this->load->view('statics/header', $header_data);
        $this->load->view('indicated_point/explore');
        $this->load->view('statics/footer');
    }


    public function edit($indicated_point_id)
    {
        $header_data['page_title'] = 'New Indicated Point | PomoBoard';
        $header_data['headline'] = 'New Indicated Point';

        $this->load->view('statics/header', $header_data);
        $this->load->view('indicated_point/edit');
        $this->load->view('statics/footer');
    }
}