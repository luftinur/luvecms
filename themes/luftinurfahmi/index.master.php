<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php echo strip_tags($pageTitle); ?></title>
		<meta name="description" content="">
		<meta name="author" content="Lufti">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- LOAD GOOGLE FONT -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,500,700" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet"> 
		
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/vendor/bootstrap/css/bootstrap.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/vendor/fontawesome/css/fontawesome.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/vendor/fontawesome/css/fa-brands.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/assets/fonts/lineicons/lineicons.css" type="text/css" media="all" />	
		
		
		<?php if(isset($pageStyle) && !empty($pageStyle)){ 
			foreach ($pageStyle as $style) {		
				echo $style;
			}
		} ?>	
		
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/assets/css/" type="text/css" media="all" />
		
		
			<script src="<?php echo $templateUrl; ?>/vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
		
		<?php if(isset($pageLinks) && !empty($pageLinks)){
			
				foreach ($pageLinks as $link) {
					
					echo $link;
					
				}
			
		} ?>		
		
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		
		<div id="header">
			<div class="container"></div>
		</div>
		
		<?php $this->load->view($this->config->item("theme").'/'.$contentFilename); ?>
		
		
		<div id="footer">
			<div class="container">
				<div class="col-md-6">
					<p class="copyright"><?php echo "&copy;".date("Y"); ?> <a href="<?php echo base_url(); ?>">www.luftinurfahmi.net</a> - All Right Reserved</p>
				</div>
				<div class="col-md-6">
					<ul class="social">
						<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						<li><a href=""><i class="fab fa-github"></i></a></li>
						<li><a href=""><i class="fab fa-behance"></i></a></li>
						
					</ul>
				</div>
			</div>
		</div>
	
		
		<script src="<?php echo $templateUrl; ?>/assets/js/scripts.js"></script>
		
		
	</body>
</html>
