<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class AdminCategories extends MY_AdminDataEntry {
	
	function __construct() {
		
		$this->isCategory = TRUE;
				
		parent::__construct();
		
		$this->data['items'] = $this->items;
       
	}
	

	public function index(){
		parent::renderAdmin($this->data);
	}
	
	protected function onDataview()
	{
		$this->data['pageTitle'] = $this->postType." Categories";
		// $this->data['pageStyle'][] = addStyle(base_url().THEMEASSETS.'vendor/datatable/media/css/jquery.dataTables.css');
		// $this->data['pageLinks'][] = addScript(base_url().THEMEASSETS.'vendor/datatable/media/js/jquery.dataTables.min.js');
// 		
		$this->data['contentFilename'] = 'categories';
		 
		 return "
		 SELECT 
		 item.* FROM #__taxonomy as item 		
		 WHERE item.postType='".$this->postType."'";
	}
	
	protected function onEdit($id){}
	
	protected function onNew(){}
	
	protected function postData($task){
		
		switch ($task) {
			case 'changestatus':
				$id = $_POST['id'];
				if($id > 0){
					$status = $_POST['status'] == 1 ? 0 : 1;
					
					$this->MY_Model->saveUpdate("#__taxonomy",$id, array("status"=>$status));
					echo "{}";
				}
				
				exit;
			break;
			
			case 'trash':
				$id = $_POST['id'];
				if($id > 0){
					
					
					$this->MY_Model->delete("#__taxonomy",$id);
					
					echo "{}";
				}
				exit;
					
			break;
			case 'save':			
				
				$this->data = new stdClass();				
				$this->data->title = trim(@$_POST['title']);
				
				$path = "";
				if(@$_POST['parent'] > 0){
						
					$parent = $this->MY_Model->getObject("SELECT pathName FROM #__taxonomy WHERE id=".$_POST['parent']);
					$path = $parent->pathName.'/';
					
				}
				
				$this->data->pathName = $path.safeUrlText($this->data->title);
				$this->data->parent = @$_POST['parent'];
				$this->data->postType = $this->postType;
				$this->data->status = 1;
				
					if($this->db->insert("ln_taxonomy",$this->data)){
						$id = $this->db->insert_id();												
						// store productsize;
						
						echo json_encode(array("id"=> $id));
						
						exit;
					}else{
						echo json_encode(array("status"=>"error"));
						exit;
					}
					
				
				
				
				break;
			
			default:
				
				break;
		}
		
		
		
	}
	
	
	
	
}
