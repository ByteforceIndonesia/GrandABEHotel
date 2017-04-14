<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Homedata extends CI_Model{
	    function __construct() {
	        $this->tableName = 'home';
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
	}
?>