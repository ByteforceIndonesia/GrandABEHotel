<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Footerdata extends CI_Model{
	    function __construct() {
	        $this->tableNameMain = 'footer';
	        $this->tableNameContact	= 'contacts';
	    }

	    public function update($data = array()){
	    	$query = $this->db->get($this->tableNameMain);
	    	if($query->num_rows()==0){
	    		$this->db->insert($this->tableNameMain, $data);
	    	}
	    	else{
	    		$this->db->update($this->tableNameMain, $data);
	    	}
	    }

	    public function getData(){
	    	$query = $this->db->get($this->tableNameMain);
	    	$row = $query->row();
	    	if(isset($row)) {
	    		return $row;
       		}
       		else {
       			return false;
       		}
	    }

	    public function createContact($data = array()){
	    	$this->db->insert($this->tableNameContact, $data);
	    }

	    public function getContacts(){
	    	$query = $this->db->get($this->tableNameContact);
	    	if(!$query) {

	    		return false;
       		}
       		else {
       			return $query->result();
       		}
	    }

	    public function selectContact($id){
	    	$this->db->where('id', $id);
	    	$query = $this->db->get($this->tableNameContact);
	    	$row = $query->row();
	    	if(isset($row)) {
	    		return $row;
       		}
       		else {
       			return false;
       		}
	    }

	    public function editContact($id, $data=array()){
	    	
    		$this->db->where('id', $id);
    		$this->db->update($this->tableNameContact, $data);
	    	
	    }

	    public function deleteContact($id){
	    	$this->db->delete($this->tableNameContact, array('id' => $id));
	    }



	}

?>