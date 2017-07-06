<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class resto_data extends CI_Model{

		function __construct() {
			parent::__construct();
	    }

	    function getDataResto()
	    {
	    	$query = $this->db->get('resto');
	    	return $query->result();
	    }

	    function getDataCafe()
	    {
	    	$query = $this->db->get('cafe');
	    	return $query->result();
	    }

	    function getImagesResto ()
	    {
	    	$query = $this->db->get('resto_img');
	    	return $query->result();
	    }

	    function getImagesCafe ()
	    {
	    	$query = $this->db->get('cafe_img');
	    	return $query->result();
	    }

	}