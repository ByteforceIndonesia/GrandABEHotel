<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct ()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('home', $this->data);
	}

	public function room ()
	{
		$this->template->load('template', 'home', $this->data);
	}
}
