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

	public function rooms ()
	{
		$this->template->load('template', 'rooms', $this->data);
	}

	public function businessandmeetings ()
	{
		$this->template->load('template', 'businessandmeetings', $this->data);
	}

	public function location ()
	{
		$this->template->load('template', 'location', $this->data);
	}

	public function weddingsandbirthdays ()
	{
		$this->template->load('template', 'weddingsandbirthdays', $this->data);
	}


}
