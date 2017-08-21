<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class News_model extends CI_Model{

		function __construct() {
			parent::__construct();
	    }

	    function getCategories()
	    {
	    	return $this->db->get('news_category')->result();
	    }

	    function getNews ()
	    {
	    	$this->db->select('news.id, news.category_id, news.title, news.content, news.image, news_category.name, news.image')
	    		->from('news')
	    		->join('news_category', 'news.category_id = news_category.id');
	    	return $this->db->get()->result();
	    }

	    function getNewsWhere($where)
	    {
	    	$this->db->select('news.id, news.category_id, news.title, news.content, news.image, news_category.name, news.image')
	    		->from('news')
	    		->join('news_category', 'news.category_id = news_category.id')
	    		->where($where);
	    	return $this->db->get()->result();
	    }

	    function new_news ($data)
	    {
	    	if($_FILES['image']['name'])
	    	{
            	$data['image'] = uniqid() . '.jpg';
	    		
    			$config['upload_path']          = './assets/images/uploads/news/';
	    		$config['file_name']			=  $data['image'];
		    	$config['overwrite']			= TRUE;
	            $config['allowed_types']        = 'jpg|jpeg';
	            $config['max_size']             = 3000;

	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error', $error);
	            	redirect(base_url('admin/news'));
	                return false;
	            }
	    	}

	    	return $this->db->insert('news', $data);
	    }

	    function new_category ($data)
	    {
	    	return $this->db->insert('news_category', $data);
	    }

	    function delete ($type, $id)
	    {
	    	$where = array('id' => $id);

	    	$to_be_deleted = $this->getNewsWhere(array('news.id' => $id))[0];

	    	switch($type)
			{
				case 'category':
				{
					if($this->getNewsWhere(array('news.category_id' => $id)))
						return false;
					else
						return $this->db->delete('news_category', $where);
				}break;

				case 'news':
				{
					if($to_be_deleted->image)
					{
						if(unlink('./assets/images/uploads/news/' . $to_be_deleted->image))
							return $this->db->delete('news', $where);
						else
							return false;
					}else
					{
						return $this->db->delete('news', $where);
					}
					
				}break;
			}
	    }

	    function edit ()
	    {
	    	$id = array('news.id' => $this->input->post('id'));

	    	$to_be_edited = $this->getNewsWhere($id);

	    	$posted = array (
	    		
	    		'title'			=> $this->input->post('title'),
	    		'category_id'	=> $this->input->post('category'),
	    		'content'		=> $this->input->post('content')

	    		);

	    	$data = $this->getNewsWhere($id)[0];

	    	if($_FILES['image']['name'])
	    	{
	    		if(!$data->image)
	    			$posted['image'] = uniqid() . '.jpg';

	    		$config['upload_path']          = './assets/images/uploads/news/';
	    		$config['file_name']			=  $posted['image'];
		    	$config['overwrite']			= TRUE;
	            $config['allowed_types']        = 'jpg|jpeg';
	            $config['max_size']             = 3000;

	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error', $error);
	            	redirect(base_url('admin/news'));
	                return false;
	            }
	    	}

	    	return $this->db->where($id)->update('news', $posted);
	    }

	    function edit_category ($data, $where)
	    {
	    	return $this->db->where($where)->update('news_category', $data);
	    }
	}