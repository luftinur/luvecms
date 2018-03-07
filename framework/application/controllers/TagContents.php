<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TagContents extends MY_Controller{
	protected 
		$sortOrder = "item.datePublished",
		$content = false,
		$contentsPerPage = 8;
		private $dataSql = " 
						SELECT item.*, tagging.tagName ,user.first_name, term.parent as parentCategory, term.pathName, term.title as categoryTitle, term.id as categoryId 
						FROM #__posts as item 
						LEFT JOIN #__taxonomy as term on item.category = term.id
						LEFT JOIN #__users as user on item.authorId = user.id
						LEFT JOIN #__tags_rel as tag on item.id = tag.postId						
						LEFT JOIN #__tags as tagging on tag.tagId = tagging.id
						WHERE item.status=1";
	function __construct(){		
	
		parent::__construct();	
		
			
			
			$tagName = $this->uri->segment(2);
			$this->data['title'] = "Tags";
			if($tagName != null){
				$offset = 0;
				$uriSegment = 2;
				$this->content = true;
				$sql = $this->dataViews(" tagging.tagName = '$tagName' ");
				
			}else{
				
				$this->data['tags'] = $this->MY_Model->getObjects("					
					SELECT tag.* FROM #__tags 	as tag		
				");
				
				
			}
			
			
			if($this->content){
				
				
			 
			 	 if($result = $this->MY_Model->get_rows_limit($sql, $this->contentsPerPage, $offset)){
			 
				 	$this->data['items'] = $result['rows']->result();
					 
					 $this->data['num_results'] = $result['num_rows'];
					       
				    // load pagination library
					$this->load->library('pagination');
					$config = array();
					$config['base_url'] = site_url("tags");
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
	
						
						
						
	public function index(){
		if($this->content){
			
			$this->data['current_page'] = $this->pagination->cur_page;
			$this->data["pagePerContents"] = $this->contentsPerPage;
			
			$this->data['title'] = $this->data['title']." > ". $this->uri->segment(2);
			
			$this->data['contentFilename'] = "tag";
			
		}else{
			$this->data['pageTitle'] = "Tags";
			
			$this->data['contentFilename'] = "tags";
		}
		
		parent::render($this->data);		
	}
	
	
	protected function dataViews($filter = ''){
		
		
		if($filter != ''){
			return $this->dataSql.' AND ' . $filter. ' ORDER BY '. $this->sortOrder. ' DESC';
		}else{
			return $this->dataSql.' ORDER BY '. $this->sortOrder . ' DESC';
		}
		
		
	}
}