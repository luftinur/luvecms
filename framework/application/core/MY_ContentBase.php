<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_ContentBase extends MY_Controller{
	
	
		protected 
		$postType,
		$sortOrder = "item.datePublished",	
		$postTypeName,
		$isCategory,
		$isHaveSubCategory, 
		$categoryName,
		$subCategoryName,
		$contents,
		$contentFileName,
		$contentsPerPage = 9,
		$contentName;
		
		
	private $dataSql = "
						SELECT item.*, term.pathName, term.title as categoryTitle, term.id as categoryId FROM #__posts as item 
						INNER JOIN #__taxonomy as term on item.category = term.id
						WHERE item.status=1
							
					";
					
	function __construct(){
		
		parent::__construct();
		
		$this->postTypeName = $this->MY_Model->getObject("SELECT item.* FROM #__post_type as item WHERE item.name='".$this->postType."'");
		$this->isCategory = $this->postTypeName->isCategory;
		$this->isHaveSubCategory = $this->postTypeName->haveSubCategory;
		
		
		
		if($this->isCategory && !$this->isHaveSubCategory){
		
			$this->categoryName = $this->uri->segment(1);
			
			$this->contentName = $this->uri->segment(2) ? $this->uri->segment(2) : '';
			$filter = " item.path='".$this->contentName."'";
				
		}else if($this->isCategory && $this->isHaveSubCategory){
			
			$this->categoryName = $this->uri->segment(1).'/'.$this->uri->segment(2);
			$this->contentName = $this->uri->segment(3) ? $this->uri->segment(3) : '';
		
			if($this->contentName){
				if($this->uri->segment(2) != ''){
				$pathUri = $this->uri->segment(1).'/'.$this->uri->segment(2);
				
				$taxonomy= $this->MY_Model->getObject("SELECT item.id FROM #__taxonomy as item WHERE item.pathName='".$pathUri."'");
				
				$filter = " item.category = $taxonomy->id AND item.path='".$this->contentName."'";
				}
			}else{
				
				$filter = "item.path='".$this->contentName."'";
			}
			
					//
			
		}
		
		
			$this->contentName = $this->MY_Model->getObject($this->dataViews($filter));
			
			if($this->contentName){
								
				$this->data['content'] = $this->contentName;
			
			}else{
					
			// check if post is category;
					
					// put uri segment 1 to categoryName
					if($this->isCategory && !$this->isHaveSubCategory){
							
						$offset = $this->uri->segment(2) ? $this->uri->segment(2) : 0;	
						if($sql = $this->dataViews()){
						
						$limit = $this->contentsPerPage;					
					
										
						
				        $result = $this->MY_Model->get_rows_limit($sql, $limit, $offset);
				        							
						
						$this->data['items'] = $result['rows']->result();
						
						
				        $this->data['num_results'] = $result['num_rows'];
				        // load pagination library
				        $this->load->library('pagination');
				        $config = array();
				        $config['base_url'] = site_url($this->categoryName);
				        $config['total_rows'] = $this->data['num_results'];
				        $config['per_page'] = $limit;
				        $config['uri_segment'] = 2;
				        $config['use_page_numbers'] = TRUE;
				        $config['query_string_segment'] = 'page';
						
				       	$this->pagination->initialize($config);
					   
					    $this->data['pagination'] = $this->pagination->create_links();
						
					
					}
				
					}else if($this->isCategory && $this->isHaveSubCategory){
						
						$parent = $this->MY_Model->getObject("SELECT term.* FROM #__taxonomy as term WHERE term.pathName='".$this->categoryName."' AND term.parent=0");
							if(isset($_GET['page'])){
								$isNumber = (int) $_GET['page'];
								if($isNumber){
									$offset = $_GET["page"] ? $_GET["page"] : 0;	
								}else{
									redirect(base_url().$parent->pathName);
								}
							
								
							}else{
								$offset = 0;
							}
						if($parent){
						
							$sql = $this->dataViews(" term.parent=".$parent->id);
						}else{
							// $offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;	
							$sql = $this->dataViews();
							
						}
						
						if($sql){
					
							
						$limit = $this->contentsPerPage;					
					
										
				        $result = $this->MY_Model->get_rows_limit($sql, $limit, $offset);
				        							
						
						$this->data['items'] = $result['rows']->result();
						
						
				        $this->data['num_results'] = $result['num_rows'];
				        // load pagination library
				        $this->load->library('pagination');
				        $config = array();
				        $config['base_url'] = site_url($this->categoryName);
				        $config['total_rows'] = $this->data['num_results'];
				        $config['per_page'] = $limit;
				        $config['uri_segment'] = 2;
				        $config['use_page_numbers'] = TRUE;
						$config['page_query_string'] = TRUE;
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
					   
					    $this->data['pagination'] = $this->pagination->create_links();
						
					
					}
				
						
					}
				
					
					
			
		
			}
		

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
	
	protected function getPosts($postType, $len= 10)
	{
					
		$result = $this->MY_Model->getObjects($this->dataSql. " AND item.postType='".$postType."'"." LIMIT 0,". $len);
									
		return $result;
		
	}
	
}
