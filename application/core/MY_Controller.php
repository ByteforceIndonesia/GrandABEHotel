<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $data;

	function __construct ()
	{
		//Inherit stuff from parent
		parent::__construct();

		//Data for frontend
		$this->data = array (
			'page_title' => 'Grand ABE Hotel'
			);
	}
}