<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{
 	
	function __construct(){
		
		parent::__construct();
		
	}
	
	public function getObjects($query=""){	
	
		if($query != ''){
			
			$set = $this->setPrefix($query);
			$queries = $this->db->query($set);
			
			return $queries->result();
		}
		
		return false;	
		
	}
	
	public function getObject($query = ""){	
		
		if($query != ''){
			$setPrefix = $this->setPrefix($query);			
			$queries = $this->db->query($setPrefix);
			
			return $queries->row();
		}
		
		return false;
		
	}
	public function delete_query($query = ""){
		if($query != ""){
			$setPrefix = $this->setPrefix($query);
			
			if($queries = $this->db->simple_query($setPrefix)){
				return true;
			}else{
				return false;
			}
		}
	}
	
	public function getRows($query = ""){
		
		if($query != ''){
			$setPrefix = $this->setPrefix($query);
			
			$queries = $this->db->query($setPrefix);
			
			return $queries->result_array();
		}
		
		return false;	
	}
	
	
	protected function setPrefix($str){
		
		return str_replace("#__", $this->db->dbprefix, $str);
		
	}
	
	 //fetch blogs
    function get_rows_limit($query, $limit, $offset) {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }
		
		$queries = $this->setPrefix($query);
		$result['rows'] = $this->db->query($queries. ' LIMIT '.$offset. ', '.$limit );
        $result['num_rows'] = count($this->getRows($query));
       
	    return $result;
    }
	
	
	function saveUpdate($table, $id, $data){
		$this->db->where("id",$id);
		
		$tbl = $this->setPrefix($table);
		
		if($this->db->update($tbl, $data)){
			return true;
		}else{
			return false;
		}
	}
	
	
	function updateData($table, $where = array(), $data){
			
		$tbl = $this->setPrefix($table);
		
		if(!empty($where)){
			
			$this->db->where($where);
			
			if(!empty($data)){
				
				foreach($data as $key => $data){
					
					$this->db->set($key, $data);
					
					
				}
				
				
			}
			
			if($this->db->update($tbl)){
				
				return true;
				
			}else{
				
				return false;
			}
		}else{
			
			return false;
		}
		
	}
	
	public function updateSet($table, $id, $field = "", $set = ""){
		if($set != ""){
			$this->db->set($field,$set, FALSE);
		}
		$this->db->where("id",$id);
		
		$tbl = $this->setPrefix($table);
		
			if($this->db->update($tbl)){
			return true;
		}else{
			return false;
		}
	}
	function insert($table, $data){
		
		$tbl = $this->setPrefix($table);
		if($this->db->insert($tbl, $data)){
			
			return $this->db->insert_id();
			
		}else{
			
			return false;
		}
		
		
	}
	
	
	function delete($table, $id){
		$tbl = $this->setPrefix($table);
		
		$this->db->where('id', $id);		
		if($this->db->delete($tbl)){
			return true;
		}else{
			return false;
		}
	
	}
	
}
