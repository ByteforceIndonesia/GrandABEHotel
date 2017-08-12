<?php

/**
 * Created by PhpStorm.
 * User: JohnNate
 * Date: 8/10/17
 * Time: 2:43 PM
 */
class Jobs extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->ion_auth->in_group('admin'))
        {
            $this->session->set_flashdata('message','You are not allowed to visit the Pages page');
            redirect('admin','refresh');
        }
    }

    function index ()
    {
        $this->data['jobs'] = $this->job_data->getJobs();

        $this->render('admin/pages/job_offers');
    }

    function new_job()
    {
        if(!$_POST){
            return $this->load->view('admin/pages/modal/new_job');
        }else{

            if($this->job_data->new_job()) {
                $this->session->set_flashdata('success', 'success');
                redirect('admin/jobs');
                return;
            }else{
                $this->session->set_flashdata('error', 'Error inputing into database'
                . '(' . $this->session->flashdata('error_file') . ')');
                redirect('admin/jobs');
                return;
            }

        }
    }

    function edit_form ()
    {
        $id = $this->input->post('id');
        $data = array('job' => $this->job_data->getSingle($id), 'id' => $id);
        return $this->load->view('admin/pages/modal/edit_job', $data);
    }

    function edit()
    {
        if($_POST){
            if($this->job_data->edit()) {
                $this->session->set_flashdata('success', 'success');
                redirect('admin/jobs');
                return;
            }else{
                $this->session->set_flashdata('error', 'Error inputing into database'
                    . '(' . $this->session->flashdata('error_file') . ')');
                redirect('admin/jobs');
                return;
            }
        }
    }

    function delete()
    {
        if($this->job_data->delete()) {
            $this->session->set_flashadata('success', 'success');
            redirect('admin/jobs');
            return;
        }else{
            $this->session->set_flashdata('error', 'Error inputing into database'
                . '(' . $this->session->flashdata('error_file') . ')');
            redirect('admin/jobs');
            return;
        }
    }

    public function delete_confirm()
    {
        $data = array('id' => $this->input->post('id'));
        return $this->load->view('admin/pages/modal/delete_confirm_jobs', $data);
    }

}