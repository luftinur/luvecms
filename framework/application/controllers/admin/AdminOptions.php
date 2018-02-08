<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * 
 */
class AdminOptions extends MY_AdminBase {
	
	function __construct() {
		
		parent::__construct();
		
	}
	
	
	public function index(){
		
		$this->data['contentFilename'] = "options";
		
		parent::renderAdmin($this->data);
		
	}
	
	
}
