<?php
class Task_Tag extends CI_Controller {

    public function explore()
    {
        $header_data['page_title'] = 'TaskTagExplore | PomoBoard';
        $header_data['headline'] = 'TaskTag Explore';

        $this->load->view('statics/header', $header_data);
        $this->load->view('task_tag/explore');
        $this->load->view('statics/footer');
    }


    public function edit($task_tag_id)
    {
        $header_data['page_title'] = 'New Project Tag | PomoBoard';
        $header_data['headline'] = 'New Project Tag';

        $this->load->view('statics/header', $header_data);
        $this->load->view('task_tag/edit');
        $this->load->view('statics/footer');
    }
}