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

		public function item_change_image($type, $id)
		{
			if($_FILES)
			{
				if($this->resto_data->change_image_upload($type, $id))
				{
					$this->session->set_flashdata('success', 'success');
					redirect(base_url('admin/resto/'));
					return;
				}else
				{
					$this->session->set_flashdata('error', 'error');
					redirect(base_url('admin/resto/'));
					return;
				}
			}else
			{
				if($type == 'resto')
				{
					$resto_item = $this->resto_data->getOneResto($id);
					$data = array('id' => $id, 'link' => $resto_item->link, 'type' => $type);
					return $this->load->view('admin/pages/modal/change_image_resto', $data);
				}else
				{
					$cafe_item = $this->resto_data->getOneCafe($id);
					$data = array('id' => $id, 'link' => $cafe_item->images, 'type' => $type);
					return $this->load->view('admin/pages/modal/change_image_resto', $data);
				}
			}
		}

		public function header_text($type)
		{
			if($this->resto_data->header_change_text($type))
				echo 'success';
			else
				return false;
		}

		public function header_image ($type)
		{
			if($_FILES)
			{
				$this->resto_data->header_change_image($type);
			}else
			{
				redirect(base_url('admin/resto'));
				return;
			}
		}

		public function item_delete($type)
		{
			$data = array ('id' => $this->input->post('id'));

			if(!$_POST)
				return false;

			if($this->resto_data->deleteItem($type, $data))
				echo 'success';
			else
				return false;
		}

		public function item_delete_modal($type, $id)
		{
			$data = array('id' => $id, 'type' => $type);

			return $this->load->view('admin/pages/modal/delete_confirm', $data);
		}

		public function category_name_change()
		{
			if($this->resto_data->category_change())
				echo 'success';
			else
				return false;
		}

		public function cafe_edit($field)
		{
			$this->resto_data->cafe_change_item($field);
		}

		public function cafe_delete()
		{
			$data = array ('id' => $this->input->post('id'));

			if($this->resto_data->restoDeleteItem($data))
				echo 'success';
			else
				return false;
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

		public function cafe_item_new()
		{
			if($_POST)
			{
				$content 	= $this->input->post('content');
				$category 	= $this->input->post('category');

				$data = array(
					'name'		=> $content,
					'value_2'	=> $category
					);

				if($this->resto_data->NewItem('cafe', $data))
					$this->session->set_flashdata('success', 'success');
				else
					$this->session->set_flashdata('error', 'error');

				redirect(base_url('admin/resto'));	

			}else
			{
				$data = array('categories' => $this->resto_data->getCakeCatagory());
				return $this->load->view('admin/pages/modal/cafe_new_item', $data);
			}
		}

		public function category_item_new()
		{
			if($_POST)
			{
				$content = $this->input->post('content');

				if($this->resto_data->NewItem('category', $content))
					$this->session->set_flashdata('success', 'success');
				else
					$this->session->set_flashdata('error', 'error');

				redirect(base_url('admin/resto'));	

			}else
			{
				return $this->load->view('admin/pages/modal/category_new_item', TRUE);
			}
		}

	}