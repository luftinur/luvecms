<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class WebContents extends MY_ContentBase{
	
	
	function __construct(){		
	//	$this->postType = "posts";
			
		parent::__construct();	
	
		
	}
	
	public function index(){
		
		$uriString = str_replace("/"," | ", uri_string());
		
				
		$this->data['pageTitle'] = $uriString. " - ".$this->data['pageTitle'];
		
		$this->data['categoryLists'] = $this->MY_Model->getObjects("SELECT * FROM #__taxonomy WHERE postType='".$this->postType."'");
		
		if($this->content){
			
			$richcard = $this->data['content'];
			
			$dataRichCard = array(
			
				"title" => $richcard->title,
				"images" => array(
						base_url().'uploads/library/'.$richcard->picture
					),
				"authorname" => $richcard->first_name == 'Admin' ? "Lufti" : "",
				"publisherName" => "Lufti Nurfahmi",
				"publisherLogo" => base_url().'themes/luftinurfahmi/assets/images/logo.png',
				"datePublished" => date(DATE_ISO8601, strtotime($richcard->datePublished)),
				"dateModified" => date(DATE_ISO8601, strtotime($richcard->dateModified)),
				"excerpt" => $richcard->excerpt
			);
			
			$this->data['content']->metaData = unserialize($this->data['content']->postMeta);
			
			$this->data['google_richcard'] = GoogleRichCard::RichCardArticle($dataRichCard, base_url().$richcard->pathName.'/'.$richcard->path, $authortype = 'Person');
			
			//$this->data['breadcrumbs'] = explode("/", uri_string());
			$uriString = explode("/",uri_string());
			$this->data['breadcrumbs'] = array();
			
			$this->data['tag'] = $this->MY_Model->getObjects("SELECT tag.* FROM #__tags as tag LEFT JOIN #__tags_rel as tagging on tag.id = tagging.tagId WHERE tagging.postId = ".$this->data['content']->id);
 			
			if(isset($uriString)){
				$countUri = count($uriString);
				foreach ($uriString as $index => $val) {
					if($index == 0){
						$this->data['breadcrumbs'][$val] = $val;	
					}else if($index == 1){
						$this->data['breadcrumbs'][$val] = $uriString[0].'/'.$val;	
					}else if($index == 2){
						if($countUri == 3){
							$this->data['breadcrumbs'][$val] = "";	
						}
						
					}
									
				}
				
				
			}
			switch ($this->postType) {
				case 'freebies':
					$this->data['contentFilename'] = "freebies-detail";
					break;
				
				default:
					
					$this->data['contentFilename'] = "article";
					break;
			}
			
		}else{
			
			$this->data['current_page'] = $this->pagination->cur_page;
			$this->data["pagePerContents"] = $this->contentsPerPage;
			switch ($this->postType) {
				case 'freebies':
					
					$this->data['pageTitle'] = "My Collection - ".$this->data['pageTitle'];
					
					$this->data['contentFilename'] = "freebies";
					break;
				
				default:
					$this->data['contentFilename'] = "articles";
					break;
			}
			
			
			
		}
		
		
		parent::render($this->data);
		
	}
	
}