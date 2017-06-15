<?php
class Indicated_Point extends CI_Controller
{

    public function explore()
    {
        $header_data['page_title'] = 'IndicatedPoint | Pomoboard';
        $header_data['headline'] = 'Explore Indicated Point';

        $this->load->view('statics/header', $header_data);
        $this->load->view('statics/footer');
    }
}