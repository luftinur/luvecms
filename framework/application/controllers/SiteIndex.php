<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteIndex extends MY_ContentBase{
	
	
	function __construct(){
		
		parent::__construct();		

	}
	
	public function index(){
		
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item("theme").'/vendor/owlcarousel/owl.carousel.min.js');
					
		$this->data['pageStyle'][] = addStyle(base_url().'themes/'.$this->config->item("theme").'/vendor/owlcarousel/assets/owl.carousel.min.css');				
		$this->data['pageStyle'][] = addStyle(base_url().'themes/'.$this->config->item("theme").'/vendor/owlcarousel/assets/owl.theme.default.min.css');		
		
		$this->data['contentFilename'] = "home";
		$this->data['freebies'] = $this->getPosts('freebies', 4);
		$this->data['freebies_category'] = $this->MY_Model->getObjects("SELECT * FROM #__taxonomy WHERE postType='freebies' AND status = 1");		
		
		$this->data['google_richcard'] = GoogleRichCard::SocialProfile("Lufti Nurfahmi", base_url(),array("social" => array("https://www.behance.net/luftinurfahmi","https://github.com/luftinur",
			"http://www.linkedin.com/in/luftinurfahmi")));
		
		$this->data['blogs'] = $this->getPosts("posts",3, 'blogs');
		
		parent::render($this->data);		
		
		
			
	}
	
	
}
