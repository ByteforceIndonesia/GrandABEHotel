<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Roomdata extends CI_Model{
	    function __construct() {
	        $this->tableNameMain = 'roomHeader';
	        $this->tableNameRooms= 'rooms';
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

	    public function createRoom($data = array()){
	    	$this->db->insert($this->tableNameRooms, $data);
	    }

	    public function getRooms(){
	    	$query = $this->db->get($this->tableNameRooms);
	    	if(!$query) {

	    		return false;
       		}
       		else {
       			return $query->result();
       		}
	    }

	    public function selectRoom($id){
	    	$this->db->where('id', $id);
	    	$query = $this->db->get($this->tableNameRooms);
	    	$row = $query->row();
	    	if(isset($row)) {
	    		return $row;
       		}
       		else {
       			return false;
       		}
	    }

	    public function editRoom($id, $data=array()){
	    	
    		$this->db->where('id', $id);
    		$this->db->update($this->tableNameRooms, $data);
	    	
	    }

	    public function deleteRoom($id){
	    	$this->db->delete($this->tableNameRooms, array('id' => $id));
	    }
	}
?>