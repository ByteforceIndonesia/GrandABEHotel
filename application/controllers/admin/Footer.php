<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Footer extends Admin_Controller
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
			$this->data['page_title'] = 'Footer Edit';
			$this->render('admin/pages/footer_edit_view');
		}

		public function edit()
		{
			
		}

		public function add()
		{
			$this->data['page_title'] = 'Add Contact Info';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_locationName','Package name','trim|required');
			
			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				$this->render('admin/footer/add_contact_view');
			}
			else
			{
				redirect('admin/footer','refresh');
			}
		}
	}
?>