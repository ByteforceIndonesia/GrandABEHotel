<?php

	class News extends Admin_Controller
	{
		function __construct()
		{
			parent::__construct();

			$this->load->model('news_model');

			if(!$this->ion_auth->in_group('admin'))
			{
				$this->session->set_flashdata('message','You are not allowed to visit the Pages page');
				redirect('admin','refresh');
			}
		}

		public function index ()
		{
			$this->data['page_title']		= 'News Edit';
			$this->data['news']				= $this->news_model->getAll();

			$this->render('admin/news/view_all');
		}


	}