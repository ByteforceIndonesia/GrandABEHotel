<?php

	class Resto extends Admin_Controller
	{
		function __construct()
		{
			parent::__construct();

			$this->load->model('resto_data');

			if(!$this->ion_auth->in_group('admin'))
			{
				$this->session->set_flashdata('message','You are not allowed to visit the Pages page');
				redirect('admin','refresh');
			}
		}

		public function index ()
		{
			$this->data['page_title']		= 'Location Edit';
			$this->data['headers']			= $this->resto_data->getHeaders();
			$this->data['resto']			= $this->resto_data->getDataResto();
			$this->data['cafe']				= $this->resto_data->getDataCafe();
			$this->data['catagories']		= $this->resto_data->getCakeCatagory();

			$this->render('admin/pages/resto_admin_view');
		}


	}