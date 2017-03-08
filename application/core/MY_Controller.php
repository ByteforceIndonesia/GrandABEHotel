<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $data;
    
    function __construct()
    {
        parent::__construct();

        //Page Title
		$this->data['page_title'] 			= $this->config_model->page_title()->value_one;

		//Parallaxes
		$this->data['parallax_one'] 					= base_url() . $this->config_model->parallax('one')->link;
		$this->data['parallax_two'] 					= base_url() . $this->config_model->parallax('two')->link;
		$this->data['parallax_three'] 					= base_url() . $this->config_model->parallax('three')->link;

		//Standard Config
		$this->data['company_logo'] 	    = base_url() . $this->config_model->company_logo()->value_one;

        //Team Members
		$this->data['team'] 			    = $this->config_model->team_members();

		//Officess
		$this->data['offices'] 			    = $this->config_model->offices();

		//Contact Us
		$this->data['contact_us'] 		    = $this->config_model->contact_us()->value_one;
    }
}