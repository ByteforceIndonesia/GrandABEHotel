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

    }

}