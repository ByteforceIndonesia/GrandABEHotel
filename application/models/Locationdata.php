<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Locationdata extends CI_Model{
		function __construct() {
	        $this->tableNameMain = 'locationHeader';
	        $this->tableNameLocations = 'locations';
	        $this->tableNamePhotos = 'locationphotos';
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

	    public function createLocation($data = array()){
	    	$this->db->insert($this->tableNameLocations, $data);
	    }

	    public function getLocations(){
	    	$query = $this->db->get($this->tableNameLocations);
	    	if(!$query) {

	    		return false;
       		}
       		else {
       			return $query->result();
       		}
	    }

	    public function selectLocation($id){
	    	$this->db->where('id', $id);
	    	$query = $this->db->get($this->tableNameLocations);
	    	$row = $query->row();
	    	if(isset($row)) {
	    		return $row;
       		}
       		else {
       			return false;
       		}
	    }

	    public function editLocation($id, $data=array()){
	    	
    		$this->db->where('id', $id);
    		$this->db->update($this->tableNameLocations, $data);
	    	
	    }

	    public function deleteLocation($id){
	    	$this->db->delete($this->tableNameLocations, array('id' => $id));
	    }


	    public function createPhoto($data = array()){
	    	$this->db->insert($this->tableNamePhotos, $data);
	    }

	    public function getPhotos(){
	    	$query = $this->db->get($this->tableNamePhotos);
	    	if(!$query) {

	    		return false;
       		}
       		else {
       			return $query->result();
       		}
	    }

	    public function selectPhoto($id){
	    	$this->db->where('id', $id);
	    	$query = $this->db->get($this->tableNamePhotos);
	    	$row = $query->row();
	    	if(isset($row)) {
	    		return $row;
       		}
       		else {
       			return false;
       		}
	    }

	    public function editPhoto($id, $data=array()){
	    	
    		$this->db->where('id', $id);
    		$this->db->update($this->tableNamePhotos, $data);
	    }

	    public function deletePhoto($id){
	    	$this->db->delete($this->tableNamePhotos, array('id' => $id));
	    }
	}