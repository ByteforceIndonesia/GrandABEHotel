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

	    function setRestoItemEdit($data)
	    {
	    	$this->db->where('id', $data['id']);
	    	return $this->db->update('resto', array('name' => $data['content']));
	    }

	    function restoDeleteItem($data)
	    {
	    	$to_be_deleted = $this->getOneResto($data['id']);

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