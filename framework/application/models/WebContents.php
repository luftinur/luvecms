<?php




/**
 * 
 */
class WebContents extends MY_Model {
	
	protected $dataSql = "SELECT items.* FROM #__posts AS items WHERE items.status = 1 ";
	
	function __construct() {
			
		parent::__construct();
		
	}
	
	// get posts by content type
	public function getPosts($postType = "posts", $category = 0, $length = 10){
		
		
		
		
	}
}
