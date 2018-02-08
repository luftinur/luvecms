<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class AdminArticles extends MY_AdminDataEntry {
	
	
	
	function __construct() {		
		
		$this->isCategory = FALSE;
		
		parent::__construct();
		
		$this->data['items'] = $this->items;
		
	}	

	public function index(){
		parent::renderAdmin($this->data);
	}
	
	protected function onDataview()
	{
		$this->data['pageTitle'] = $this->postType;
		
		$this->data['contentFilename'] = 'posts';
		
		if(isset($_GET['filter'])){
			
			$filter = $_GET['filter'];
						
			$datasort = "";
			switch ($filter) {
				case 'draft':
					$datasort = " item.status = 0";
					break;
				case 'publish':
					$datasort = " item.status = 1";
					break;
				case 'trash':
					$datasort = " item.status = 2";
					break;
				default:
					$datasort = ' item.status <= 1';
					break;
			}
			
			return "
				 SELECT 
				 item.*, user.username, term.title as categoryTitle FROM #__posts as item 
				 LEFT JOIN #__taxonomy as term  ON item.category = term.id
				 LEFT JOIN #__users as user ON item.authorId = user.id
				 WHERE item.postType='".$this->postType."' AND ". $datasort;
		}else{
				return "
				 SELECT 
				 item.*, user.username, term.title as categoryTitle FROM #__posts as item 
				 LEFT JOIN #__taxonomy as term  ON item.category = term.id
				 LEFT JOIN #__users as user ON item.authorId = user.id
				 WHERE item.postType='".$this->postType."' AND item.status <= 1
			 ";
		}
		
		
	}
	
	protected function onEdit($id){
		
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/tinymce/tinymce.min.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/jquery.tagsinput.min.js');
		
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/vendor/jquery.ui.widget.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/jquery.iframe-transport.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/jquery.fileupload.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/jquery.fileupload-process.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/jquery.fileupload-validate.js');
		
		
		$this->data['pageStyle'][] = addStyle(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/css/jquery.fileupload.css');
		
		$this->data['pageStyle'][] = addStyle(base_url().'themes/'.$this->config->item('admintheme').'/vendor/jquery.tagsinput.min.css');
		
			
		$this->data['contentFilename'] = 'posts-edit';
		
		$this->data['content'] = $this->MY_Model->getObject("
		SELECT item.*, term.id as categoryId, term.title as categoryTitle, term.pathName as categoryName
		FROM #__posts 
		as item 
		LEFT JOIN #__taxonomy as term on item.category = term.id
		WHERE item.id=$id");
		
		if($this->data['content']->tags != ''){
				
			// $tIdList = explode(",",$this->data['content']->tags);
			
			$tIdList = $this->MY_Model->getRows("SELECT tagName FROM #__tags WHERE id IN(".$this->data['content']->tags.")");
			$this->data['tagList'] = array();
			foreach($tIdList as $tId){				
				$this->data['tagList'][] = $tId['tagName'];
				
			}
			
		}
		$this->data['content']->postMeta = unserialize($this->data['content']->postMeta);
		
		if($this->enabledGallery){
			$this->data['photos'] = $this->MY_Model->getObjects("SELECT photos.* FROM #__media as photos WHERE photos.owner=".$this->data['content']->id);
		}
		
		
		$this->data['pageTitle'] = 'Edit Post | <small>'. $this->data['content']->title.'</small>';
		
	}
	
	protected function onNew(){
		
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/tinymce/tinymce.min.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/jquery.tagsinput.min.js');
		
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/vendor/jquery.ui.widget.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/jquery.iframe-transport.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/jquery.fileupload.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/jquery.fileupload-process.js');
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/js/jquery.fileupload-validate.js');
		
		
		$this->data['pageStyle'][] = addStyle(base_url().'themes/'.$this->config->item('admintheme').'/vendor/fileupload/css/jquery.fileupload.css');
		
		
		
		$this->data['pageStyle'][] = addStyle(base_url().'themes/'.$this->config->item('admintheme').'/vendor/jquery.tagsinput.min.css');
			
		$this->data['contentFilename'] = 'posts-edit';
		$this->data['pageTitle'] = "New ".$this->postType;
		$this->content = new stdClass();
		
		$this->content->id = 0;
		$this->content->title = '';
		$this->content->path = '';				
		$this->content->pathName = '';
		$this->content->body = '';
		$this->content->status = 0;
		$this->content->picture = '';
		$this->content->category = 0;
		$this->content->categoryTitle = '';
		$this->content->excerpt = "";
		
		
		
		$this->data["content"] = $this->content;
		
	}
	
	protected function postData($task){
		
		parent::postData($task);
		
		switch ($task){				
			
			case 'save':
				
				$id = @$_POST['id'];
				
				$this->data = new stdClass();
				
				$this->data->title = trim(@$_POST['title']);
				$this->data->path = safeUrlText($this->data->title);
				$this->data->category = @$_POST['category'];
				$this->data->body = @$_POST['body'];
					
				if(!empty($_POST['postMeta'])){

					$meta = array();
					
					$meta  = empty( $_POST['postMeta'])?array(): $_POST['postMeta'];
					$this->data->postMeta = serialize($meta);
				}
					
				$this->data->authorId = 1;
				$this->data->status = @$_POST['status'];
				
				if(@$_POST['excerpt'] != ""){					
					$this->data->excerpt = @$_POST['excerpt'];
				}else{
					$this->data->excerpt = strip_tags(substr($this->data->body,0,50));
				}		
				
				if($id > 0){
				
					$this->data->dateModified = date('Y-m-d H:i:s');
					$this->data->modifierdId = 1;
					
				}else{
					
					$this->data->datePublished = $this->data->dateCreated = $this->data->dateModified = date('Y-m-d H:i:s');
					$this->data->modifierdId = 1;
				}
				
				$this->data->postType = $this->postType;
				
				$this->data->picture = @$_POST['picture'];
                
				
				$tagList = array();
				
				
				if($id > 0){
					
					$tIdList = $this->MY_Model->getObject("SELECT tags FROM #__posts WHERE id=".$id);
					
					
// 					
					if($tIdList->tags != NULL){						
						if(findChar($tIdList->tags, ",")){
							$tagList = explode(",",$tIdList->tags);
						}else{
							$tagList[] = $tIdList->tags;
						}						
					}
					
					$this->data->tags = $this->updateTags(@$_POST['tags'], $id, $tagList);
				
					if($this->MY_Model->saveUpdate("#__posts",$id , $this->data)){
						
						
							
						echo json_encode(array("id" => $id));				
						exit;
						
					}else{
						echo json_encode(array("status"=>"error"));
						exit;
					}
					
				}else{
					
					if($this->db->insert("ln_posts",$this->data)){						
						
						$id = $this->db->insert_id();
						
						$tags = $this->updateTags(@$_POST['tags'], $id, $tagList);
						
						$this->MY_Model->saveUpdate("#__posts", $id, array("tags"=>$tags));
						
						
						echo json_encode(array("id"=>$id));
						exit;
					}else{
						echo json_encode(array("status"=>"error"));
						exit;
					}
					
					
				}
				
				
				break;
			
			default:
				
				break;
		}
		
		
		
	}
	
	private function updateTags($strTags, $postId, $prevTagList = array()){
		
		 if($strTags != ''){
		 		$tags = array();
				if(findChar($strTags, ",")){
					$tags = explode(",", $strTags);
				}else{
					$tags[] = $strTags;
				}
				
				
				$ids = array();
				
				
				foreach ($tags as $tag){
					$tagTitle = trim($tag);
					if($tagTitle){
						
						$insert_rel = true;
						
						$tagName = safeUrlText($tagTitle);
						$tagId = 0;
						if($existTag = $this->MY_Model->getObject("SELECT id FROM #__tags WHERE tagName ='".$tagName."'")){
							
							
							if($this->MY_Model->getObject("SELECT id FROM #__tags_rel WHERE tagId = ".$existTag->id." AND postId=".$postId)){
								
								$insert_rel = false;
							}
							
							$tagId = $existTag->id;
							
						}else{
							
							$this->db->insert("ln_tags", array("tagName" => $tagName, "tagTitle"=>$tagTitle));
							$tagId = $this->db->insert_id();
							
						}
						$ids[] = $tagId;
						// Insert Tags Relationship
						if($insert_rel){
							
							$this->db->insert("ln_tags_rel", array("tagId"=>$tagId,"postId"=>$postId));						
							$this->MY_Model->updateSet("#__tags", $tagId, "numContents", " numContents + 1 ");
						}
						
						
					}
				}
			}
			
			if(!empty($ids)){
				
			$strTagId = implode(",", $ids);		
			
				if($strTagId){
					$this->MY_Model->delete_query("DELETE FROM #__tags_rel WHERE tagId NOT IN(".$strTagId.") AND postId=".$postId);
				}else{
					$this->MY_Model->delete_query("DELETE FROM #__tags_rel WHERE postId=".$postId);
					
				}
			
				if(!empty($prevTagList)){
					  
		             // if($ids){
		                 foreach($prevTagList as $prevtid)
		                    {
		                        if(array_search($prevtid,$ids) === false)
		                        {
		                        	$this->MY_Model->updateSet("#__tags", $prevtid, "numContents", " numContents - 1 ");
		                           //  app::$database->query("UPDATE #__tags SET numContents = numContents-1 WHERE id=$prevtid");
		                        }
		                    }
		             // }
				}
			
				return $strTagId;
			}
			return '';
			
		
	}
	
	
}
