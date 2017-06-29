<?php
class Indicated_Point extends CI_Controller
{

    public function explore()
    {
        $header_data['page_title'] = 'IndicatedPoint | Pomoboard';
        $header_data['headline'] = 'Explore Indicated Point';

        if (array_key_exists('submit', $_POST) && $_POST['submit'] === 'explore')
        {
            $list = $this->IndicatedPoint->get_list($this->User->logined(),
                $_POST['title'], $_POST['memo'], $_POST['keyword'],
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
        $this->load->view('indicated_point/explore', $data);
        $this->load->view('statics/footer');
    }


    public function edit($indicated_point_id)
    {
        $this->form_validation->set_rules('indicated_point_title', 'Indicated Point Title', 'trim|required');
        $this->form_validation->set_rules('indicated_point_memo', 'Indicated Point Memo', 'trim');

        $header_data['page_title'] = 'New Indicated Point | PomoBoard';
        $header_data['headline'] = 'New Indicated Point';

        if ($this->form_validation->run() == false)
        {
            $data = array(
                'indicated_point_id' => $indicated_point_id
            );
            $data['indicated_point'] = ($indicated_point_id === "new")? null: $this->IndicatedPoint->get_by_indicated_point_id($this->User->logined(), intval($indicated_point_id));

            $this->load->view('statics/header', $header_data);
            $this->load->view('indicated_point/edit', $data);
            $this->load->view('statics/footer');
        }
        else
        {
            if ($indicated_point_id === "new")
            {
                $this->IndicatedPoint->insert($this->User->logined(),
                    $_POST['indicated_point_title'], $_POST['indicated_point_memo']);
                set_flash_message('Inserted the indicated point.');
            }
            else
            {
                $this->IndicatedPoint->update($this->User->logined(), $indicated_point_id,
                    $_POST['indicated_point_title'], $_POST['indicated_point_memo']);
                set_flash_message('Updated the indicated point.');
            }
            redirect('indicated_point/explore');
        }
    }


    public function delete($indicated_point_id)
    {
        $this->IndicatedPoint->delete($this->User->logined(), intval($indicated_point_id));
        set_flash_message('Delete the Indicated Point');

        redirect('indicated_point/explore');
    }
}
