<?php
class Project_Tag extends CI_Controller {

        public function explore()
        {
                $header_data['page_title'] = 'ProjectTagExplore | PomoBoard';
                $header_data['headline'] = 'ProjectTag Explore';

                $this->load->view('statics/header', $header_data);
                $this->load->view('project_tag/explore');
                $this->load->view('statics/footer');
        }
}