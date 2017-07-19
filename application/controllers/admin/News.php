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

		public function index()
		{
			$this->data['page_title']		= 'Location Edit';
			$this->data['categories']		= $this->news_model->getCategories();
			$this->data['news']				= $this->news_model->getNews();

			$this->render('admin/news/view_all');
		}

		public function new_news()
		{
			if($_POST)
			{
				$data = array (
					
					'title'			=> $this->input->post('title'),
					'category_id'	=> $this->input->post('category'),
					'content'		=> $this->input->post('content'),
					'image'			=> uniqid() . '.jpg'

					);

				// Check if no category is available
				if($data['category_id'] == null)
				{
					$this->session->set_flashdata('error', 'Please Create a Category First');
					redirect(base_url('admin/news'));
					return;
				}

				if($this->news_model->new_news($data))
				{
					$this->session->set_flashdata('success', 'success');
					redirect(base_url('admin/news'));
					return;
				}else
				{
					$this->session->set_flashdata('error', 'Error inserting into database');
					redirect(base_url('admin/news'));
					return;
				}
			}else
			{
				$data = array('categories' => $this->news_model->getCategories());
				return $this->load->view('admin/news/modal/new_news', $data);
			}
		}

		public function new_category ()
		{
			if($_POST)
			{
				$data = array('name' => $this->input->post('category'));

				if($this->news_model->new_category($data))
				{
					$this->session->set_flashdata('success', 'success');
					redirect(base_url('admin/news'));
					return;
				}else
				{
					$this->session->set_flashdata('error', 'Error inserting into database');
					redirect(base_url('admin/news'));
					return;
				}
			}else
			{
				return $this->load->view('admin/news/modal/new_category', TRUE);
			}
		}

		public function delete_confirm($type, $id)
		{
			$data = array('id' => $id, 'type' => $type);
			return $this->load->view('admin/news/modal/confirm_box', $data);
		}

		public function delete ($type)
		{
			$id = $this->input->post('id');

			if($this->news_model->delete($type, $id))
			{
				$this->session->set_flashdata('success', 'success');
				echo 'true';
			}else
			{
				$this->session->set_flashdata('error', 'Error deleteing, Check if category is linked to press');
				return false;
			}

		}

		public function delete_test ($type, $id)
		{

			if($this->news_model->delete($type, $id))
			{
				$this->session->set_flashdata('success', 'success');
				echo 'true';
			}else
			{
				$this->session->set_flashdata('error', 'Error deleteing, Check if category is linked to press');
				return false;
			}

		}

		public function edit($id = null)
		{
			if($_POST)
			{
				if($this->news_model->edit())
				{
					$this->session->set_flashdata('success', 'success');
					redirect(base_url('admin/news'));
					return;
				}else
				{
					$this->session->set_flashdata('error', 'Error inserting into database');
					redirect(base_url('admin/news'));
					return;
				}
			}else
			{
				$data = array(

					'datas' => $this->news_model->getNewsWhere(array('news.id' => $id))[0],
					'categories' => $this->news_model->getCategories()

					);
				return $this->load->view('admin/news/modal/edit_news', $data);
			}
		}

	}