<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_ContentBase extends MY_Controller{
	
	
		protected 
		$postType,
		$sortOrder = "item.datePublished",
		$content = FALSE,
		$categoryName,
		$contentsPerPage = 8;
		
		
	private $dataSql = " 
						SELECT item.*,user.first_name, term.parent as parentCategory, term.pathName, term.title as categoryTitle, term.id as categoryId 
						FROM #__posts as item 
						LEFT JOIN #__taxonomy as term on item.category = term.id
						LEFT JOIN #__users as user on item.authorId = user.id
						WHERE item.status=1";
					
	function __construct(){
		
		parent::__construct();
		if($this->uri->segment(1) != NULL){
			
		$postType = $this->MY_Model->getObject("SELECT postType FROM #__taxonomy WHERE pathName='".trim($this->uri->segment(1))."'");
		
		if(!$postType){
			show_404();
		}
		
		$this->postType = $postType->postType;
		
		$postName = $this->MY_Model->getObject("SELECT * FROM #__post_type WHERE name='".$this->postType."'");
		
		 $offset = 0;
		$uriSegment = 2;
			 
		if($postName->isCategory && $postName->haveSubCategory){
			
			 $segment1 = $this->uri->segment(1);			
			 $segment2 = $this->uri->segment(2);
			 $segment3 = $this->uri->segment(3);
			 
						
			
			 if(!is_numeric($segment2) && $segment2 != NULL){
			 	
				// is numeric then pagination run
			
					if(!is_numeric($segment3) && $segment3 !==NULL){
						
						$this->content = TRUE;
						
						$filter = "term.pathName='".$segment1.'/'.$segment2."' AND item.path='".$segment3."'";
						
						$sql = $this->dataViews($filter);
						
						if(!$this->data['content'] = $this->MY_Model->getObject($sql)){
							show_404();
						}else{
							$this->load->helper('cookie');
							// this line will return the cookie which has slug name
							$check_visitor = $this->input->cookie(urldecode($this->data['content']->path), FALSE);
						    $ip = $this->input->ip_address();
						    if ($check_visitor == false) {
						        $cookie = array(
						            "name"   => urldecode($this->data['content']->path),
						            "value"  => "$ip",
						            "expire" =>  time() + 7200,
						            "secure" => false
						        );
						        $this->input->set_cookie($cookie);
						        $this->updateCounter(urldecode($this->data['content']->path));
						    }
							//echo $this->input->ip_address();
							//echo session_id();
							
						}
						
					}else{
						
						$offset = $segment3 ? $segment3 : 0;
						$uriSegment = 3;
						$this->categoryName = $segment1.'/'.$segment2;
						$filter = "term.pathName='".$segment1.'/'.$segment2."'";
						$sql = $this->dataViews($filter);
						
						if($segment3 > 0){
							$this->data['title'] = str_replace("/", " | ", $this->categoryName ). " | ". $segment3;
						}else{
							$this->data['title'] = str_replace("/", " | ", $this->categoryName );
						}
						
			 
						
					}
					
					
				
			 }else{
			 	
				$parentId = $this->MY_Model->getObject("SELECT id FROM #__taxonomy WHERE pathName='".$segment1."'");
				$offset = $this->uri->segment(2) ? $this->uri->segment(2) : 0;	
						
				if(!$parentId){
					show_404();
				}
				$filter = " term.parent=".$parentId->id;
				
				$this->categoryName=$segment1;
				
				if($segment1 > 0){
							$this->data['title'] = str_replace("/", " | ", $this->categoryName ). " | ". $segment3;
						}else{
							$this->data['title'] = str_replace("/", " | ", $this->categoryName );
						}
				
				
				$sql = $this->dataViews($filter);
			 }			
			
			
		}else{
			// single category only
			 $segment1 = $this->uri->segment(1);			
			 $segment2 = $this->uri->segment(2);
			 
			 if(!is_numeric($segment2) && $segment2 != NULL){
			 	
				// is numeric then pagination run
				$this->content = TRUE;
				$filter = "item.path='".$segment2."'";
				$sql = $this->dataViews($filter);
				
				if(!$this->data['content'] = $this->MY_Model->getObject($sql)){
					show_404();
				}
					
					
			 }else{
			 	
				$offset = $segment2 ? $segment2 : 0;
				$this->categoryName = $segment1;
						
				if($segment1 > 0){
							$this->data['title'] = str_replace("/", " | ", $this->categoryName ). " | ". $segment3;
						}else{
							$this->data['title'] = str_replace("/", " | ", $this->categoryName );
						}
				$filter = "term.pathName='".$segment1."'";
				$sql = $this->dataViews($filter);
			 }
		}
		
		
		
		
		
		 if(!$this->content){
			 	 if($result = $this->MY_Model->get_rows_limit($sql, $this->contentsPerPage, $offset)){
			 
				 	$this->data['items'] = $result['rows']->result();
					 
					 $this->data['num_results'] = $result['num_rows'];
					       
				    // load pagination library
					$this->load->library('pagination');
					$config = array();
					$config['base_url'] = site_url($this->categoryName);
					$config['total_rows'] = $this->data['num_results'];
					$config['per_page'] = $this->contentsPerPage;
					$config['uri_segment'] = $uriSegment;
					$config['use_page_numbers'] = TRUE;
					$config['page_query_string'] = FALSE;
					$config['query_string_segment'] = 'page';
							
				 	$config["full_tag_open"] = '<ul class="pagination">';
					$config["full_tag_close"] = '</ul>';	
					$config["first_link"] = "&laquo;";
					$config["first_tag_open"] = "<li>";
					$config["first_tag_close"] = "</li>";
					$config["last_link"] = "&raquo;";
					$config["last_tag_open"] = "<li>";
					$config["last_tag_close"] = "</li>";
					$config['next_link'] = '&gt;';
					$config['next_tag_open'] = '<li>';
					$config['next_tag_close'] = '<li>';
					$config['prev_link'] = '&lt;';
					$config['prev_tag_open'] = '<li>';
					$config['prev_tag_close'] = '<li>';
					$config['cur_tag_open'] = '<li class="active"><a href="#">';
					$config['cur_tag_close'] = '</a></li>';
					$config['num_tag_open'] = '<li>';
					$config['num_tag_close'] = '</li>';
							
					$this->pagination->initialize($config);
					
					
					$this->data['totalPages'] = ceil($config['total_rows']/$this->contentsPerPage);
					
					$this->data['pagination'] = $this->pagination->create_links();
					 
				 }
			 }
		
		}
	}

	private function updateCounter($slug){
		$this->db->where('path', urldecode($slug));
	    $this->db->select('views');
	    $count = $this->db->get('ln_posts')->row();
	// then increase by one 
	    $this->db->where('path', urldecode($slug));
	    $this->db->set('views', ($count->views + 1));
	    $this->db->update('ln_posts');
	}


	protected function dataViews($filter = ''){
		
		
		if($filter != ''){
			return $this->dataSql.' AND item.postType="'.$this->postType.'" AND ' . $filter. ' ORDER BY '. $this->sortOrder. ' DESC';
		}else{
			return $this->dataSql.' AND item.postType="'.$this->postType.'" AND term.pathName="'.$this->categoryName.'"'. ' ORDER BY '. $this->sortOrder . ' DESC';
		}
		
		
	}

	protected function getContent($contentname){
	
	
		
	}
	
	protected function getPosts($postType, $len= 10, $category = '')
	{
		if($category != ''){
			$result = $this->MY_Model->getObjects($this->dataSql. " AND term.pathName='$category' AND item.postType='".$postType."'"." LIMIT 0,". $len);
		}else{
			$result = $this->MY_Model->getObjects($this->dataSql. " AND item.postType='".$postType."'"." LIMIT 0,". $len);
		}
		
									
		return $result;
		
	}
	
}
