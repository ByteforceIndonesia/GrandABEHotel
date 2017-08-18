<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Mainsettingsdata extends CI_Model{
		function __construct() {
	        $this->tableName = 'mainsettings';
	    }
	    public function update($data = array()){
	    	$query = $this->db->get($this->tableName);
	    	if($query->num_rows()==0){
	    		$this->db->insert($this->tableName, $data);
	    	}
	    	else{
	    		$this->db->update($this->tableName, $data);
	    	}
	    }

	    function new_slider($data)
        {
            return $this->db->insert('main_slider', $data);
        }

	    public function getData(){
	    	$query = $this->db->get($this->tableName);
	    	$row = $query->row();
	    	if(isset($row)) {
	    		return $row;
       		}
       		else {
       			return false;
       		}
	    }

	    public function delete_slider()
        {

        }

        function getSlider ()
        {
            return $this->db->get('main_slider')->result();
        }

	}