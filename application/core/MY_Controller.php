<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	function __construct ()
	{
		//Inherit stuff from parent
		parent::__construct();

		//Data for frontend
		$data = array (
			$page_title = 'Grand ABE Hotel'
			);
	}
}