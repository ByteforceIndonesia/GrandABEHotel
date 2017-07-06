<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class resto_data extends CI_Model{

		function __construct() {
			parent::__construct();
	    }

	    function getDataResto()
	    {
	    	$query = $this->db->select('resto.name, resto_img.link')
	    					->from('resto')
	    					->join('resto_img', 'resto.value_1 = resto_img.id')
	    					->get();
	    	return $query->result();
	    }

	    function getDataCafe()
	    {
	    	$query = $this->db->select('cafe.name, cafe_img.images, cafe_catagory.catagory, cafe.value_2')
	    				->from('cafe')
	    				->join('cafe_img','cafe.value_1 = cafe_img.id')
	    				->join('cafe_catagory', 'cafe.value_2 = cafe_catagory.id')
	    				->get();
	    	return $query->result();
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

	}