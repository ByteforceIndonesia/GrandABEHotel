<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct ()
	{
		parent::__construct();

		$data = array (
			'page_title' => 'Grand ABE Hotel Jayapura'
			);
	}

	public function index()
	{
		$this->template->load('template', 'home', $data);
	}
}
