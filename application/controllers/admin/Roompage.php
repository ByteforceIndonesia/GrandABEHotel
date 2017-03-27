<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Roompage extends Admin_Controller
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
			$this->data['page_title'] = 'Room Edit';
			$this->render('admin/pages/room_page_edit_view');
		}

		public function edit()
		{
			
		}

		public function create()
		{
			$this->data['page_title'] = 'Add Room';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_roomName','Room name','trim|required');
			
			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				$this->render('admin/rooms/create_room_view');
			}
			else
			{
				redirect('admin/roompage','refresh');
			}
		}
	}
?>