<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class AdminMedia extends MY_AdminBase {
	
	function __construct() {
		parent::__construct();
		
		$this->data['pageTitle'] = "Media";
		
		
	}
	
	private $dataSql = "SELECT item.* from #__media as item WHERE item.mediaType = 'library' AND item.owner = 0 ORDER BY item.id DESC";
	
	
	function index(){
		
		if($this->input->is_ajax_request() &&  $_GET['task']){			
			$this->onPostData($_GET['task']);
		}else{
						
			$this->data['contentFilename'] = "media";			
			$this->data['items'] = $this->MY_Model->getObjects($this->dataSql);
			
			parent::renderAdmin($this->data);
			
		}		
		
		
	}
	
	
	protected function onPostData($task){
		
		if($task != ''){
			
			switch ($task) {
				case 'getmedia':
					
					$mediaObj = $this->MY_Model->getObjects($this->dataSql);
					
					echo json_encode($mediaObj);
// 					
					exit;					
					break;
				case 'uploadmedia':
					
					$this->load->library("UploadHandler");			
					
					
					exit;
					break;
					
				case 'uploadgallery':
					
					$id = $_GET['id'];
					
					$this->load->library("UploadHandler", array("mediaType"=>'gallery', "owner"=>$id));
					
					// $uploadHandler = new UploadHandler(NULL,TRUE, NULL, "gallery");
					//$this->UploadHandler->__construct(NULL, TRUE, NULL, "gallery");
					exit;
					break;
				case 'deletephoto':
				
					$id = $_POST['id'];
					if($id > 0){
						//$status = $_POST['status'] == 1 ? 0 : 1;
						$this->MY_Model->delete("#__media", $id);
						echo "{}";
					}
					
				
					exit;
					break;
					
				case 'savecaption':
				
					$id = $_POST['id'];
					if($id > 0){
						//$status = $_POST['status'] == 1 ? 0 : 1;
						
						$this->MY_Model->saveUpdate("#__media", $id, array("description"=>@$_POST['caption']));
						echo "{}";
					}
					
				
					exit;
					break;	
					
				default:
					
					break;
			}
			
		}
		
		
	}
	
	
	
}

