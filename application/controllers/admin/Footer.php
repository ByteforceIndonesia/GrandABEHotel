<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Footer extends Admin_Controller
	{
		function __construct()
		{
			parent::__construct();

			$this->load->model('footerdata');

			if(!$this->ion_auth->in_group('admin'))
			{
				$this->session->set_flashdata('message','You are not allowed to visit the Pages page');
				redirect('admin','refresh');
			}
		}
		public function index()
		{
			$this->data['page_title'] = 'Footer Edit';

			if($result1 = $this->footerdata->getData()){
				$this->data['footer'] = $result1;
			}
			if($result2 = $this->footerdata->getContacts()){
				$this->data['contacts'] = $result2;
			}
			$this->render('admin/pages/footer_edit_view');	

		}

		public function edit()
		{
			$result = $this->footerdata->getData();
			$this->data['footer'] = $result;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_footerTitle','Footer Title','trim|required');
			$this->form_validation->set_rules('ta_footerContent','Footer Content','trim|required');
			$this->form_validation->set_rules('ta_addressContent','Address','trim|required');
			$this->form_validation->set_rules('ta_newsletterContent','newsletter','trim|required');			

			if($this->form_validation->run() === FALSE)
			{
				$this->load->helper('form');
				$this->render('admin/pages/footer_edit_view');
			}
			else{
				$data = array(
					'ta_footerTitle'=>$this->input->post('ta_footerTitle'),
					'ta_footerContent'=>$this->input->post('ta_footerContent'),
					'ta_newsletterContent'=>$this->input->post('ta_newsletterContent'),
					'ta_addressContent'=>$this->input->post('ta_addressContent')
					);
				$this->footerdata->update($data);
				$this->session->set_flashdata('message','Update Success');
				redirect('admin/footer','refresh');
			}

		}

		public function addContact()
		{
			$this->data['page_title'] = 'Add Contact Info';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_socialMedia','Social Media Name','trim|required');
			$this->form_validation->set_rules('ta_link','Link','trim|required');

			
			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				$this->render('admin/footer/add_contact_view');
			}
			else
			{
				$data = array(
						'socialmedia'=>$this->input->post('ta_socialMedia'),
						'link'=>$this->input->post('ta_link')
					);

				$this->footerdata->createContact($data);
				$this->session->set_flashdata('message','Contact Info Successfully Added');
				redirect('admin/footer','refresh');
			}
		}

		public function editContact($id=NULL){

			$id = $this->input->post('id') ? $this->input->post('id') : $id;
			$result = $this->footerdata->selectContact($id);
			$this->data['contact'] = $result;

			$this->data['page_title'] = 'Edit Contact Info';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_socialMedia','Social Media Name','trim|required');
			$this->form_validation->set_rules('ta_link','Link','trim|required');

			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				$this->render('admin/footer/edit_contact_view');
			}
			else
			{
				$id = $this->input->post('id') ? $this->input->post('id') : $id;
				$result = $this->footerdata->selectContact($id);
				$this->data['contact'] = $result;

				$data = array(
						'socialmedia'=>$this->input->post('ta_socialMedia'),
						'link'=>$this->input->post('ta_link')
					);

				$this->footerdata->editContact($id,$data);
				$this->session->set_flashdata('message','Contact Info Successfully Edited');
				redirect('admin/footer','refresh');
			}
		}

		public function deleteContact($id=NULL){
			$id = $this->input->post('id') ? $this->input->post('id') : $id;
			if(is_null($id))
			{
				$this->session->set_flashdata('message','There\'s no package to delete');
			}
			else{
				$this->footerdata->deleteContact($id);
				$this->session->set_flashdata('message','Contact successfully deleted');
			}
			
			redirect('admin/footer','refresh');
		}
	}
?>