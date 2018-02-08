<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteIndex extends MY_Controller{
	
	
	function __construct(){
		
		$this->showPopupAds = true;
		parent::__construct();		
		

	}
	
	public function index(){
		
		$this->data['pageLinks'][] = addScript(base_url().'themes/'.$this->config->item("theme").'/vendor/owlcarousel/owl.carousel.min.js');
					
		$this->data['pageStyle'][] = addStyle(base_url().'themes/'.$this->config->item("theme").'/vendor/owlcarousel/assets/owl.carousel.min.css');				
		$this->data['pageStyle'][] = addStyle(base_url().'themes/'.$this->config->item("theme").'/vendor/owlcarousel/assets/owl.theme.default.min.css');		
		
		$this->data['contentFilename'] = "home";
						
		parent::render($this->data);		
		
		
			
	}
	
	
}
