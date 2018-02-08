<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class AdminIndex extends MY_AdminBase {
	
	function __construct() {
	
		parent::__construct();
		$this->data['pageTitle'] = "Dashboard";
        
        if($this->uri->segment(2) == ''){
            redirect(base_url().'admin/dashboard');
        }
        
		// $this->load->helper("ipsum"); 		
		// for($i = 0; $i < 9; $i++){ 			
			// $data = array();
			// $data['authorId'] = $this->data['user']->id;
			// $data['title'] = Ipsum::get_title();
			// $data['path'] = safeUrlText($data['title']);
			// $data['category'] = 0;
			// $data['excerpt'] = Ipsum::get_words(20);
			// $data['body'] = Ipsum::getPa();
			// $data['status'] = 1;
			// $data['dateCreated'] = $data['datePublished'] = $data['dateModified']= date("Y-m-d H:i:s");
			// $data['postType'] = "portfolio";
				// $this->db->insert("ln_posts", $data);			
		// }
		
	}
	
	public function index(){
		
		$this->data['contentFilename'] = "home";		
		
		parent::renderAdmin($this->data);
	}
	
}
