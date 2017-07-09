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

		public function resto_item_edit()
		{
			$data = array(
				'id' 		=> $this->input->post('id'),
				'content'	=> $this->input->post('content'),
			);

			if($this->resto_data->setRestoItemEdit($data)['error'] == null)
				echo 'success';
			else
				return false;
		}

		public function resto_item_delete()
		{
			$data = array ('id' => $this->input->post('id'));

			if($this->resto_data->restoDeleteItem($data))
				echo 'success';
			else
				return false;
		}

		public function resto_item_delete_modal($id)
		{
			$data = array('id' => $id);
			return $this->load->view('admin/pages/modal/delete_confirm', $data);
		}

		public function resto_item_new()
		{
			if($_POST)
			{
				$content = $this->input->post('content');

				if($this->resto_data->restoNewItem($content))
					$this->session->set_flashdata('success', 'success');
				else
					$this->session->set_flashdata('error', 'error');

				redirect(base_url('admin/resto'));	

			}else
			{
				return $this->load->view('admin/pages/resto_new_item', TRUE);
			}
		}

	}