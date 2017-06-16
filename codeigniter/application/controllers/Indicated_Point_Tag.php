<?php
class Indicated_Point_Tag extends CI_Controller
{

    public function explore()
    {
        $header_data['page_title'] = 'IndicatedPointTag | PomoBoard';
        $header_data['headline'] = 'IndicatedPointTag Expore';

        if (array_key_exists('submit', $_POST) && $_POST['submit'] === 'explore')
        {
            $list = $this->IndicatedPointTag->get_list($this->User->logined(),
                $_POST['indicated_point_tag_name'],
                $_POST['begin_created_date'], $_POST['end_created_date'],
                $_POST['begin_updated_date'], $_POST['end_updated_date']);
        }
        else
        {
            $list = array();
        }

        $data = array(
            'list' => $list
        );

        $this->load->view('statics/header', $header_data);
        $this->load->view('indicated_point_tag/explore', $data);
        $this->load->view('statics/footer');
    }


    public function edit($indicated_point_tag_id)
    {
        $this->form_validation->set_rules('indicated_point_tag_name', 'Indicated Point Tag name', 'trim|required');

        $header_data['page_title'] = 'New IndicatedPointTag | PomoBoard';
        $header_data['headline'] = 'New Indicated Point Tag';

        if ($this->form_validation->run() === false)
        {
            $data = array(
                'indicated_point_tag' => ($indicated_point_tag_id === "new")? null: $this->IndicatedPointTag->get_by_indicated_point_tag_id($this->User->logined(), $indicated_point_tag_id)
            );
            $this->load->view('statics/header', $header_data);
            $this->load->view('indicated_point_tag/edit', $data);
            $this->load->view('statics/footer');
        }
        else
        {
            if ($indicated_point_tag_id === "new")
            {
                $this->IndicatedPointTag->insert($this->User->logined(), $_POST['indicated_point_tag_name']);
                set_flash_message($this, 'Inserted new indicated point tag');
            }
            else
            {
                $this->IndicatedPointTag->update($this->User->logined(),
                    intval($indicated_point_tag_id), $_POST['indicated_point_tag_name']);
                set_flash_message($this, 'Updated new indicated point tag');
            }
            redirect('indicated_point_tag/explore');
        }
    }
}