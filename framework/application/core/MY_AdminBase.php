<?php
	
	/**
	 * 
	 */
	class MY_AdminBase extends MY_Controller {
			
		function __construct(){
			
			parent::__construct();
			if (!$this->ion_auth->logged_in())
            {
                redirect('admin/login');
            }else{
                $this->data['userinfo'] = $this->ion_auth->user()->row();                
            }
            
            if(!$this->ion_auth->is_admin()){
                redirect(base_url());
            }
                                    
			$this->data['pageTitle'] = "";
			
			$this->data['adminMenus'] = array(
				
				array(
					"title" => "Media",
					"icon"	=> "fa-camera-retro" ,
					"path" => "admin/media"		
				),	
				array(
					"title" => "Posts",
					"icon" => "fa-files-o",
					"path" => "admin/posts",
					"group" => array(
					
								array(
									"title" => "New Post",
									"path" => "admin/posts/new",								
									),
								array(
									"title" => "Categories",
									"path" => "admin/posts/categories"
									)
								)
								
				),
				
				array(
					"title" => "Portfolio",
					"icon" => "fa-briefcase",
					"path" => "admin/portfolio",
					"group" => array(
					
								array(
									"title" => "New Post",
									"path" => "admin/portfolio/new",								
									),
								array(
									"title" => "Categories",
									"path" => "admin/portfolio/categories"
									)
								)
								
				),
				
				array(
					"title" => "Freebies",
					"icon" => "fa-download",
					"path" => "admin/freebies",
					"group" => array(
					
								array(
									"title" => "New Post",
									"path" => "admin/freebies/new",								
									),
								array(
									"title" => "Categories",
									"path" => "admin/freebies/categories"
									)
								)
								
				),
				'-',
				array(
					"title" => "Options",
					"icon" => "fa-cog",
					"path" => "admin/options",								
				),
				array(
					"title" => "Users",
					"icon" => "fa-users",
					"path" => "admin/users",								
				),
			);	
			
			
						
		}
        
        
        
		
		
		
	}
	
	
	

?>