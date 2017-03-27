<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Bnm extends Admin_Controller
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
		public function index()
		{
			$this->data['page_title'] = 'Business & Meetings Edit';
			$this->render('admin/pages/bnm_page_edit_view');
		}

		public function edit()
		{
			
		}

		public function create()
		{
			$this->data['page_title'] = 'Add Package';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_packageName','Package name','trim|required');
			
			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				$this->render('admin/bnm/create_package_view');
			}
			else
			{
				redirect('admin/bnm','refresh');
			}
		}
	}
?>