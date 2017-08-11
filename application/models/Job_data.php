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


}