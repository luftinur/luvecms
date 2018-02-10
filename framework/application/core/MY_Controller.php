<?php
defined('BASEPATH') OR exit('No direct script access allowed');



		
class MY_Controller extends CI_Controller{
 	
	protected $data, $showPopupAds = false, $isLoggedin, $themeUrl, $templateUrl;
	
	function __construct(){
		
		parent::__construct();
		
		$this->data['showPopup'] = $this->showPopupAds;
	
		
		$this->data['pageTitle'] = $this->pageTitle();
		$this->data['isLoggedin'] = $this->isLoggedin = $this->ion_auth->logged_in();
		
		if($this->data['isLoggedin']){
			$this->data['user'] =  $this->ion_auth->user()->row();
		
		}
		
		//$this->data['pageTitle'] = "";
		
		
		
	}
	
	protected function render($data){
		
		$data['templateUrl'] = base_url().'themes/'.$this->config->item("theme");
		$this->load->view($this->config->item("theme")."/index.master.php", $data);
	
	}
	
	protected function renderAdmin($data){
						
		$data['templateUrl'] = base_url().'themes/'.$this->config->item("admintheme");
		
		$this->load->view($this->config->item("admintheme")."/index.master.php", $data);
	
	}
	
	function pageTitle(){
		
		$siteName = $this->MY_Model->getObject("SELECT item.* FROM #__options as item WHERE option_key='site_name'");
		
		return $siteName->option_value;
	}
	

	
	
	
}
