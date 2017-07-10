<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class resto_data extends CI_Model{

		function __construct() {
			parent::__construct();
	    }

	    function getDataResto()
	    {
	    	$query = $this->db->select('resto.id, resto.name, resto_img.link')
	    					->from('resto')
	    					->join('resto_img', 'resto.value_1 = resto_img.id')
	    					->get();
	    	return $query->result();
	    }

	    function getDataCafe()
	    {
	    	$query = $this->db->select('cafe.id, cafe.name, cafe_img.images, cafe_catagory.catagory, cafe.value_2')
	    				->from('cafe')
	    				->join('cafe_img','cafe.value_1 = cafe_img.id')
	    				->join('cafe_catagory', 'cafe.value_2 = cafe_catagory.id')
	    				->get();
	    	return $query->result();
	    }

	    function getLastResto ()
	    {
	    	$this->db->select('*')
	    			->from('resto')
			    	->join('resto_img', 'resto.value_1 = resto_img.id')
			    	->order_by('resto.id', 'DESC')
			    	->limit(1);
	    	return $this->db->get()->row();
	    }

	    function getLastRestoImg()
	    {
	    	$this->db->select('*')
	    			->from('resto_img')
			    	->order_by('id', 'DESC')
			    	->limit(1);
	    	return $this->db->get()->row();
	    }

	    function getCakeCatagory ()
	    {
	    	$query = $this->db->get('cafe_catagory');
	    	return $query->result();
	    }

	    function getHeaders()
	    {
	    	$query = $this->db->get('resto_headers');
	    	return $query->result();
	    }

	    function getOneResto ($id)
	    {
	    	$query = $this->db->where('resto.id', $id)
	    					->from('resto')
	    					->join('resto_img', 'resto.value_1 = resto_img.id')
	    					->get();
	    	return $query->row();
	    }

	    function getOneCafe ($id)
	    {
	    	$query = $this->db->where('cafe.id', $id)
	    					->from('cafe')
	    					->join('cafe_img', 'cafe.value_1 = cafe_img.id')
	    					->join('cafe_catagory', 'cafe.value_2 = cafe_catagory.id')
	    					->get();
	    	return $query->row();
	    }

	    function category_change()
	    {
	    	$id 		= $this->input->post('id');
	    	$content	= $this->input->post('content');

	    	return $this->db->where('id', $id)
	    			->update('cafe_catagory', array('catagory' => $content));
	    }

	    function cafe_change_item($type)
	    {
	    	switch($type)
	    	{
	    		case 'category':
		    	{
		    		$id = $this->input->post('id');
		    		$content = $this->input->post('content');

		    		return $this->db->where('id', $id)->update('cafe', array('value_2' => $content));
		    	}break;
	    	}
	    }

	    function setRestoItemEdit($data)
	    {
	    	$this->db->where('id', $data['id']);
	    	return $this->db->update('resto', array('name' => $data['content']));
	    }

	    function deleteItem($type, $data)
	    {
	    	if($type == 'resto')
	    		$to_be_deleted = $this->getOneResto($data['id']);
	    	else if($type == 'cafe')
	    		$to_be_deleted = $this->getOneCafe($data['id']);
	    	else if($type == 'category')
	    	{
	    		// Check if the category is being use
	    		if($this->db->where('value_2', $data['id'])->get('cafe')->row())
	    		{
	    			return false;
	    		}else
	    			return $this->db->where('id', $data['id'])->delete('cafe_catagory');
	    	}

	    	try
	    	{
	    		if($this->db->where('id', $to_be_deleted->id)->delete('resto'))
	    			if($this->db->where('id', $to_be_deleted->value_1)->delete('resto_img'))
	    				if(unlink(base_url() . '/' . $to_be_deleted->link))
	    					return true;
	    	}catch(exception $e)
	    	{
	    		return array('error' => $e);
	    	}
	    }

	    function header_change_text($type)
	    {
	    	$content = $this->input->post('content');

	    	$data = array('value_1' => $content);

	    	$this->db->where('name', $type . '_header');
	    	return $this->db->update('resto_headers', $data);
	    }

	    function header_change_image($type)
	    {
	    	switch($type)
	    	{
	    		case 'resto':
	    		{
			    	$config['upload_path']          = './assets/images/resto/';
			    	$config['file_name']			=  'resto_header.jpg';
	    		}break;

	    		case 'cafe':
	    		{
			    	$config['upload_path']          = './assets/images/cake/';
			    	$config['file_name']			=  'cafe_header.jpg';
	    		}break;
	    	}


	    	$config['overwrite']			= TRUE;
            $config['allowed_types']        = 'jpg|jpeg';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('header_image'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);

                print_r($error);
                exit;

            	redirect(base_url('admin/resto'));
                return;
            }
            else
            {
            	$this->session->set_flashdata('success', 'success');
            	redirect(base_url('admin/resto'));
            	return;
            }
	    }

	    function change_image_upload($type, $id)
	    {
	    	if($type == 'resto')
	    	{
	    		$item = $this->getOneResto($id);
	    		$config['upload_path']          = './assets/images/resto/';
	    	}else
	    	{	
	    		$item = $this->getOneCafe($id);
	    		$config['upload_path']          = './assets/images/cake/';
	    	}

	    	$config['file_name']			=  $item->value_1 . '.jpg';
	    	$config['overwrite']			= TRUE;
            $config['allowed_types']        = 'jpg|jpeg';
            $config['max_size']             = 3000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('new-image'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
            	redirect(base_url('admin/resto'));
                return false;
            }
            else
            {
            	$this->session->set_flashdata('success', 'success');
            	redirect(base_url('admin/resto'));
            	return;
            }
	    }

	    function restoNewItem($content)
	    {
	    	$last = $this->getLastRestoImg();

	    	// Check if data is null
	    	if($last == null)
	    	{
	    		$last = 0;
       			$data_img['id'] = 0;
       			$data['id']	= 0;
	    	}else
	    	{
	    		$last = $last->id;
	    	}

	    	$config['upload_path']          = './assets/images/resto/';
	    	$config['file_name']			=  $last+1 . '.jpg';
            $config['allowed_types']        = 'jpg|jpeg';
            $config['max_size']             = 3000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                return false;
            }
            else
            {
            	// For Debugs
                $upload_data = $this->upload->data();

                $data = array (
                	'name'		=> $content
                	);

                $data_img = array (
                	'name'	=> 'image_freatured',
                	'link'	=> 'images/resto/' . $config['file_name']
                	);
                
            	if($this->db->insert('resto_img', $data_img))
            	{
            		$data['value_1'] = $last+1;

            		if($this->db->insert('resto', $data))
	                	return $upload_data;
	                else
	                {
	                	$this->session->set_flashdata('error', 'Error Inserting Into Database');
	                	return false;
	                }
            	}else
            	{
            		$this->session->set_flashdata('error', 'Error Inserting Into Database');
            		return false;
            	}

            }
	    }

	}