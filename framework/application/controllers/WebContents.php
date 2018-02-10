<?php


class WebContents extends MY_ContentBase{
	
	
	function __construct(){		
	//	$this->postType = "posts";
			
		parent::__construct();	
		
	}
	
	public function index(){
		
		$uriString = str_replace("/"," | ", uri_string());
		
				
		$this->data['pageTitle'] = $uriString. " - ".$this->data['pageTitle'];
		
		if($this->content){
			
			
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