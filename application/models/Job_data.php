<?php

/**
 * Created by PhpStorm.
 * User: JohnNate
 * Date: 8/10/17
 * Time: 2:36 PM
 */
class Job_data extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getJobs ()
    {
        $this->db->from('jobs');
        return $this->db->get()->result();
    }

    function getSingle($id)
    {
        return $this->db->from('jobs')
            ->where('id', $id)
            ->get()->row();
    }

    function new_job()
    {
        $new_data = array(

            'title'     => $this->input->post('title'),
            'content'   => $this->input->post('content'),
            'image'     => uniqid() . '.jpg',
            'created'   => date('Y-m-d')

        );

        if($_FILES['image']['name']){

            $config['upload_path']          = './assets/images/uploads/jobs';
            $config['file_name']            = $new_data['image'];
            $config['overwrite']            = true;
            $config['allowed_types']        = 'jpg|jpeg';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image'))
            {
                $this->session->set_flashdata('error_file', $this->upload->display_errors());
                return false;
            }else{
                $upload_data = $this->upload->data();
            }
        }else{
            $new_data['image'] = null;
        }

        return $this->db->insert('jobs', $new_data);
    }

    function edit()
    {
        if(!$_POST['id'])
            return false;
        else {

            $id = $this->input->post('id');

            $old_data = $this->db->from('jobs')
                ->where('id', $id)
                ->get()->row();

            $new_data = array (

                'title'     => $this->input->post('title'),
                'content'   => $this->input->post('content')

            );

            if($_FILES['image']['name']){
                /* If User Uploaded file */

                if(!$old_data->image)
                    $new_data['image'] = uniqid() . '.jpg';
                else
                    $new_data['image'] = $old_data->image;

                $config['upload_path']          = './assets/images/uploads/jobs';
                $config['file_name']            = $new_data['image'];
                $config['overwrite']            = true;
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 5000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image'))
                {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    return false;
                }else{
                    $upload_data = $this->upload->data();
                }
            }

            if($this->db->where('id', $id)->update('jobs', $new_data))
            {
                return true;
            }else
            {
                return false;
            }
        }
    }

    function delete ()
    {
        if(!$_POST['id'])
            return false;
        else {
            $id = $this->input->post('id');

            $old_data = $this->db->where('id', $id)
                                ->get('jobs')->row();

            if($old_data->image) {
                if (!unlink('./assets/images/uploads/jobs/' . $old_data->image)) {
                    $this->session->set_flashdata('error_file', 'Error Deleting File.');
                    return false;
                }
            }

            if($this->db->where('id', $id)->delete('jobs'))
            {
                echo 'success';
            }else{
                return false;
            }

        }
    }
}