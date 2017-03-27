<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Location extends Admin_Controller
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
			$this->data['page_title'] = 'Location Edit';
			$this->render('admin/pages/location_page_edit_view');
		}

		public function edit()
		{
			
		}

		public function addlocation()
		{
			$this->data['page_title'] = 'Add Package';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_locationName','Package name','trim|required');
			
			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				$this->render('admin/location/add_location_view');
			}
			else
			{
				redirect('admin/location','refresh');
			}
		}

		public function addimage()
		{
			$this->data['page_title'] = 'Add Image';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_imageTitle','Package name','trim|required');
			
			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				$this->render('admin/location/add_image_view');
			}
			else
			{
				redirect('admin/location','refresh');
			}
		}
	}
?>