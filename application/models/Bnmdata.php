<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Bnmdata extends CI_Model{
	    function __construct() {
	        $this->tableNameMain = 'bnm';
	        $this->tableNamePackage= 'package';
	        $this->tableNamePhotos = 'bnmimages';
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

	    public function createPackage($data = array()){
	    	$this->db->insert($this->tableNamePackage, $data);
	    }

	    public function getPackages(){
	    	$query = $this->db->get($this->tableNamePackage);
	    	if(!$query) {

	    		return false;
       		}
       		else {
       			return $query->result();
       		}
	    }

	    public function selectPackage($id){
	    	$this->db->where('id', $id);
	    	$query = $this->db->get($this->tableNamePackage);
	    	$row = $query->row();
	    	if(isset($row)) {
	    		return $row;
       		}
       		else {
       			return false;
       		}
	    }

	    public function editPackage($id, $data=array()){
    		$this->db->where('id', $id);
    		$this->db->update($this->tableNamePackage, $data);
	    	
	    }

	    public function deletePackage($id){
	    	$this->db->delete($this->tableNamePackage, array('id' => $id));
	    }

	    public function getImages(){
	    	$query = $this->db->get($this->tableNamePhotos);
	    	if(!$query) {
	    		return false;
       		}
       		else {
       			return $query->result();
       		}
	    }

	    public function addImages($data = array()){
	    	$insert = $this->db->insert_batch($this->tableNamePhotos,$data);
			return $insert?true:false;
	    }

	    public function deleteImage($id){
	    	$this->db->delete($this->tableNamePhotos, array('id' => $id));
	    }

	}
?>