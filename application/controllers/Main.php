<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct ()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->load('template', 'home', $this->data);
	}
}
