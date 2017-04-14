<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Wnbdata extends CI_Model{

		function __construct() {
	        $this->tableNameMain = 'wnb';
	        $this->tableNameWedding= 'wedding';
	        $this->tableNameBirthday= 'birthday';
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

	    public function getWeddingPhotos(){
	    	$query = $this->db->get($this->tableNameWedding);
	    	if(!$query) {

	    		return false;
       		}
       		else {
       			return $query->result();
       		}
	    }

	    public function addWeddingPhotos($data = array()){
	    	$insert = $this->db->insert_batch($this->tableNameWedding,$data);
			return $insert?true:false;
	    }

	    public function deleteWeddingPhoto($id){
	    	$this->db->delete($this->tableNameWedding, array('id' => $id));
	    }

	    public function getBirthdayPhotos(){
	    	$query = $this->db->get($this->tableNameBirthday);
	    	if(!$query) {
	    		
	    		return false;
       		}
       		else {
       			return $query->result();
       		}
	    }

	    public function addBirthdayPhotos($data = array()){
	    	$insert = $this->db->insert_batch($this->tableNameBirthday,$data);
			return $insert?true:false;
	    }

	    public function deleteBirthdayPhoto($id){
	    	$this->db->delete($this->tableNameBirthday, array('id' => $id));
	    }

	}
?>