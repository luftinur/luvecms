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
		<meta name="" content="">
		<!-- LOAD GOOGLE FONT -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,500,700" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet"> 
		
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/vendor/bootstrap/css/bootstrap.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/vendor/fontawesome/css/fontawesome.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/vendor/fontawesome/css/fa-brands.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/vendor/fontawesome/css/fa-solid.min.css" type="text/css" media="all" />
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
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KGRHVK4');</script>
		<!-- End Google Tag Manager -->
		
		<script type="application/ld+json">
		{
		  "@context": "http://schema.org",
		  "@type": "Person",
		  "name": "Lufti Nurfahmi",
		  "url": "<?php echo base_url(); ?>",
		  "sameAs": [
			"https://www.behance.net/luftinurfahmi",
			"https://github.com/luftinur",
			"http://www.linkedin.com/in/luftinurfahmi",
		  ]
		}
		</script>
		
		
		
	</head>

	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGRHVK4"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<div id="header" class="navbar navbar-default">
			<div class="container">
				
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
					<li>
						<a href="<?php echo base_url().'/freebies'; ?>">Freebies</a>
					</li>
					<li>
						<a href="<?php echo base_url().'/blogs'; ?>">Blogs</a>
					</li>
				</ul>	
				<ul class="social pull-right">
					<li><a href="http://www.linkedin.com/in/luftinurfahmi"><i class="fab fa-linkedin"></i></a></li>
					<li><a href="https://github.com/luftinur"><i class="fab fa-github"></i></a></li>
					<li><a href="https://www.behance.net/luftinurfahmi"><i class="fab fa-behance"></i></a></li>
						
				</ul>			
			</div>
		</div>
		
		<?php $this->load->view($this->config->item("theme").'/'.$contentFilename); ?>
		
		
		<div id="footer">
			<div class="container">
				<div class="col-md-6">
					<p class="copyright"><?php echo "&copy;".date("Y"); ?> <a href="<?php echo base_url(); ?>">www.luftinurfahmi.net</a> - All Right Reserved</p>
				</div>
				<div class="col-md-6">
					<ul class="social">
						<li><a href="http://www.linkedin.com/in/luftinurfahmi"><i class="fab fa-linkedin"></i></a></li>
						<li><a href="https://github.com/luftinur"><i class="fab fa-github"></i></a></li>
						<li><a href="https://www.behance.net/luftinurfahmi"><i class="fab fa-behance"></i></a></li>
						
					</ul>
				</div>
			</div>
		</div>
	
		
		<script src="<?php echo $templateUrl; ?>/assets/js/scripts.js"></script>
		
		
	</body>
</html>
