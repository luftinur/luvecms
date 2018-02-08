<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MediaGallery extends MY_ContentBase {
	
	function __construct() {
			
		$this->postType = "albums";
		
		parent::__construct();
		
		if($this->contentName){
					$this->data['galleries'] = $this->MY_Model->getObjects(
				"SELECT item.* FROM #__media as item 
				WHERE item.owner=".$this->data['content']->id." 
				AND item.mediaType = 'gallery'
				AND item.status=1 ORDER BY item.ordering"
			);
			
			$this->data['pageLinks'][] = addScript(base_url().THEMEASSETS.'vendor/masonry.pkgd.min.js');
			$this->data['pageLinks'][] = addScript( base_url().THEMEASSETS.'vendor/imagesloaded.pkgd.min.js');
			$this->data['pageLinks'][] = addScript(base_url().THEMEASSETS.'vendor/lightbox/js/lightbox.min.js');
			
 			$this->data['contentFilename'] = "album";
			
		}else{
			$this->data['contentFilename'] = "albums";
		}
	}
	
	public function index(){
		$this->data['items'] = $this->getPosts($this->postType);
		
		parent::render($this->data);
	}
}
