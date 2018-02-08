<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php echo strip_tags($pageTitle); ?></title>
		<meta name="description" content="">
		<meta name="author" content="lufti">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		
		<!-- LOAD CSS -->
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/vendor/bootstrap/css/bootstrap.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/vendor/fontawesome/css/font-awesome.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/" type="text/css" media="all" />
		<?php if(isset($pageStyle) && !empty($pageStyle)){ 
			foreach ($pageStyle as $style) {		
				echo $style;
			}
		} ?>	
		<script>
			var base_url = "<?php echo base_url(); ?>";
		</script>
		<script src="<?php echo $templateUrl; ?>/vendor/jquery-1.12.1.min.js" type="text/javascript"></script>
		<script src="<?php echo $templateUrl; ?>/js/dataTable.js" type="text/javascript"></script>
		
		<?php if(isset($pageLinks) && !empty($pageLinks)){
			
				foreach ($pageLinks as $link) {
					
					echo $link;
					
				}
			
		} ?>
	</head>

	<body>
		
		<?php if($this->ion_auth->logged_in()){ ?>			
			<div id="header">
				<div class="logo">
					<a href="<?php echo base_url().'admin'; ?>">
						<span>ADMIN CMS</span>
					</a>
				</div>
				<div class="header-right">
					
					<div class="dropdown user-menu">
						
						<button id="user-menu" class="dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="true" data-toggle="dropdown"><div class="avatar"><i class="fa fa-user-o"></i></div><i class="fa fa-caret-down"></i></button>
						
						<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="user-menu">
							<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>	
							<li class="divider"></li>
							<li><a href="<?php echo base_url().'admin/logout'; ?>"><i class="fa fa-sign-out"></i> Sign Out</a></li>				
						</ul>
					</div>
				</div>				
			</div>
			
			<div id="sidebar">
				<div class="sidebar-heading">
					<span>Navigation</span>
					<a href="javascript:;" id="toggleSidebar"><i class="fa fa-caret-left"></i></a>				
				</div>
				
				<div class="side-menu">
					<ul class="menu">	
						<li ><a  class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active': ''; ?>" href="<?php echo base_url().'admin'; ?>"><i class="fa fa-th-large"></i> Overview</a></li>					
						<?php foreach($adminMenus as $menu){ ?> 
							<?php if(is_array($menu)){ ?> 
							<li class="<?php echo isset($menu['group']) ? "hassub":""; ?> <?php echo $this->uri->segment(2) == strtolower($menu['title']) ? 'active': ''; ?>">							
								<a  class="<?php echo $this->uri->segment(2) == strtolower($menu['title']) ? 'active': ''; ?>" href="<?php echo base_url().$menu['path']; ?>"><i class="fa <?php echo $menu['icon']; ?>"></i> <?php echo $menu['title']; ?></a>						
								
								<?php if(isset($menu['group'])){?> 
									<ul>
										<?php foreach($menu['group'] as $group){ ?> 
											
											<li><a href="<?php echo base_url().$group['path']; ?>"><?php echo $group['title']; ?></a></li>
										
										<?php } ?>
										
									</ul>
									
								<?php } ?>
							
							</li>
							<?php }else{ ?> 
								<li class="divider"></li>
							<?php } ?>
						<?php } ?>
						
					</ul>
				</div>
			</div>
						
			<div id="content-wrapper">
				<div class="container-fluid">
					<?php $this->load->view($this->config->item("admintheme").'/'.$contentFilename); ?>
				</div>
			</div>
			
		<?php }else{ ?> 
 		
			<?php $this->load->view($this->config->item("admintheme").'/'.$contentFilename); ?>
		
		<?php } ?>
		
		
		<script src="<?php echo $templateUrl ?>/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		
	</body>
</html>
