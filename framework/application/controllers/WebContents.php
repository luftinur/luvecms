<?php


class WebContents extends MY_ContentBase{
	
	function __construct(){
		
		$this->postType('articles');
		
		parent::__construct();
		
		if($this->contentName){
				$this->data['contentFilename'] = "article";
		}else{
			
			$this->data['contentFilename'] = "articles";
		}
		
	}
	
	public function index(){
		
		if(!$this->contentName){
			$this->data['current_page'] = $this->pagination->cur_page;
		}
		
		parent::render($this->data);
		
	}
	
}