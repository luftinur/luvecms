<?php


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
			
			//$this->data['breadcrumbs'] = explode("/", uri_string());
			$uriString = explode("/",uri_string());
			$this->data['breadcrumbs'] = array();
			
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