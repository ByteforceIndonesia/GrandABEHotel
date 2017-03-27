<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Homepage extends Admin_Controller
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
			$this->data['page_title'] = 'Home Edit';
			$this->render('admin/pages/home_page_edit_view');
		}

		public function edit()
		{
			$name = $_FILES["upload_bg"]["backgorund"];
    		$ext = end((explode(".", $name)));

			$config['upload_path']   = base_url().'/assets/images/upload/' ;
			$config['allowed_types'] = 'png';
			$config['max_size']      = 0;
			$this->load->library('upload', $config);

			if(! $this->upload->do_upload()){
        		$error = array('error' => $this->upload->display_errors());

        		$this->render('', $error);
    		}
		}
	}
?>