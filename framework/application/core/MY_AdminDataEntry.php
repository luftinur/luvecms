<?php
	
	/**
	 * 
	 */
	class MY_AdminDataEntry extends MY_AdminBase {
			
		protected 
		$postType, 
		$items, 
		$isCategory = true, 
		$isFeaturedImage = true,
		$contentsPerPage = 12,
		$enabledGallery = false;
		
		function __construct(){
			
			parent::__construct();	
			
			$this->postType  = $this->uri->segment(2);	
			$this->data['postType'] = $this->postType;
			// check if post type exist
			
			$checkPostType = $this->MY_Model->getObject("SELECT * FROM #__post_type WHERE name = '".$this->postType."'");
			
			if(!$checkPostType){
				show_404();
			}
			
			if($this->data['galleryUpload'] = $checkPostType->isGallery){
								
				$this->enabledGallery = TRUE;
				$this->data['galleryUpload'] = $this->enabledGallery;
				
			}
			
			$this->data['categories'] = $this->MY_Model->getObjects("SELECT term.* FROM #__taxonomy as term WHERE term.status = 1 AND term.postType='".$this->postType."'");
			$this->data['statusPost'] = array("Unpublish", "Published", "On Trash");
			
			$isEdit = $this->uri->segment(3);
			
			
			$id = @$_GET['id'];
			
			$this->data['isCategory'] = $this->isCategory;
			
			if(isset($isEdit) && $isEdit == "edit" || $isEdit == 'new'){
				
				
				if($isEdit == 'edit'){
					if(isset($id)){
						$this->onEdit($id);
					}else{
						redirect(base_url().'admin/news');
					}
				}else{
					$this->onNew();
				}
				
				
				
			}else{
				
				if(is_numeric($this->uri->segment(3))){
					$offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;	
				}else{
					$offset = $this->uri->segment(4) ? $this->uri->segment(4) : 0;	
				}
				
				
				
				if($sql = $this->onDataView()){
						
					$this->load->library("pagination");
					
					$limit = $this->contentsPerPage;
					
					$result = $this->MY_Model->get_rows_limit($sql, $limit, $offset);
					 
						 $this->items = $result['rows']->result();
						
						
				        $this->data['num_results'] = $result['num_rows'];
				        // load pagination library
				        $this->load->library('pagination');
				        $config = array();
				        $config['base_url'] = base_url().'admin/'.$this->uri->segment(2);
				        $config['total_rows'] = $this->data['num_results'];
				        $config['per_page'] = $limit;
				        $config['uri_segment'] = 3;
				        $config['use_page_numbers'] = TRUE;
						
						$config['full_tag_open'] = '<ul class="pagination">';
						$config['full_tag_close'] = '</ul>';
						$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
						$config['first_tag_open'] = '<li class="prev page">';
						$config['first_tag_close'] = '</li>';
						$config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
						$config['last_tag_open'] = '<li class="next page">';
						$config['last_tag_close'] = '</li>';
						$config['next_link'] = '<i class="fa fa-angle-right"></i>';
						$config['next_tag_open'] = '<li class="next page">';
						$config['next_tag_close'] = '</li>';
						$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
						$config['prev_tag_open'] = '<li class="prev page">';
						$config['prev_tag_close'] = '</li>';
						$config['cur_tag_open'] = '<li class="active"><a href="">';
						$config['cur_tag_close'] = '</a></li>';
						$config['num_tag_open'] = '<li class="page">';
						$config['num_tag_close'] = '</li>';
						// $config['display_pages'] = FALSE;
						// 
						$config['anchor_class'] = 'follow_link';
												
						
				       	$this->pagination->initialize($config);
					   
					    $this->data['pagination'] = $this->pagination->create_links();
					 
					//$this->items = $this->MY_Model->getObjects($sql);
				}
			
			}
			
			if($this->input->server("REQUEST_METHOD") == "POST"){
				$task = @$_POST['task'];
				if(isset($task)){
					$this->postData($task);
					exit;
				}
			}
			
						
		}
		
		
		protected function onDataView(){}
		protected function onEdit($id){}
		protected function onNew(){}
		protected function postData($task){
			
			switch ($task) {
				case 'changestatus':
				
					$id = $_POST['id'];
					if($id > 0){
						$status = $_POST['status'] == 1 ? 0 : 1;
						
						$this->MY_Model->saveUpdate("#__posts",$id, array("status"=>$status));
						echo "{}";
					}
					
					exit;
				break;
				
				case 'trash':
					$id = $_POST['id'];
					if($id > 0){
						
						
						$this->MY_Model->saveUpdate("#__posts",$id, array("status"=> 2));
						
						echo "{}";
					}
					exit;
						
				break;
			}
			
			
		}
		
		
	}
	
	
	

?>