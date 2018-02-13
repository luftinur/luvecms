<div id="hero" class="static-background parallax" style="background-image:url(<?php echo $templateUrl; ?>/assets/images/hero-image.jpg);">
	<div class="inner-hero container">

		<div class="box-nav-wrapper">
			<div class="box">
				<a href="#home-about"> <span>Am</span> <span class="small">About Me</span> </a>
			</div>
			<div class="box blank"></div>

			<div class="box">
				<a href="#freebies"> <span>F</span> <span class="small">Freebies</span> </a>
			</div>
			<div class="box blank"></div>
			<div class="box">
				<a href="#"> <span>C</span> <span class="small">Contact</span> </a>
			</div>
		</div>

		<div class="hero-text">
			<h3>Lufti Nurfahmi</h3>
			<h1><strong>UX & Web</strong> Developer</h1>
			<p>
				<em>"Websites promote you 24/7: No employee will do that." - Paul Cookson</em>
			</p>
		</div>

	</div>
</div>

<div id="home-about" class="section">
	<div class="container">
			<div class="col-md-8">

				<div class="heading-section">
					<div class="lbl-icon">
						<i class="icon-profile-male"></i>
					</div>
					<div class="heading-text">
						<h2 class="h3 title">About<span>UI / UX, Web Developer</span></h2>
					</div>
				</div>

				<div class="content-section">

					<p>
						Internet things become a new world since it’s founded, 
						then Im falling in love to <strong>develop websites</strong> with clean and elegant code.
						And combining my ability to designing, <strong>UI/UX</strong> is my focus to create simple and useful experience. 
					</p>
					<p>
						Currently I'm Fulltime Employee at <a href="http://www.limestones.co.id" target="_blank"><strong>Limestones Digital Agency</strong></a> as a <strong>Digital Developer</strong>
						Below is what I'am doing in my expertise
					</p>
	
					<div class="services col-4">
						<div class="service-item">
							<i class="icon-browser"></i>
							<span>Wireframing</span>
						</div>
						<div class="service-item">
							<i class="icon-tools"></i>
							<span>Design</span>
						</div>
						<div class="service-item">
							<i class="icon-laptop"></i>
							<span>Programming</span>
						</div>
						<div class="service-item">
							<i class="icon-linegraph"></i>
							<span>Optimization</span>
						</div>
					</div>

				</div>

			</div>

			<div class="col-md-4">
				<div class="about-picture">
					<img src="<?php echo $templateUrl . '/assets/images/profil-luftinurfahmi.jpg'; ?>" alt="About Lufti Nurfahmi" />
				</div>

			</div>
	</div>
</div>

<div id="clients" class="section">
	<div class="container">
		<div class="col-md-12">
			<div class="clients owl-carousel">
				<div class="clients-item">
					<img src="<?php echo $templateUrl . '/assets/images/services/html5.jpg'; ?>" alt="HTML 5" />
				</div>
				<div class="clients-item">
					<img src="<?php echo $templateUrl . '/assets/images/services/css3.jpg'; ?>"  alt="CSS 3" />
				</div>
				<div class="clients-item">
					<img src="<?php echo $templateUrl . '/assets/images/services/nodejs.jpg'; ?>"  alt="Node JS" />
				</div>
				<div class="clients-item">
					<img src="<?php echo $templateUrl . '/assets/images/services/jquery.jpg'; ?>"  alt="jQuery" />
				</div>
				<div class="clients-item">
					<img src="<?php echo $templateUrl . '/assets/images/services/php.jpg'; ?>"  alt="PHP" />
				</div>
			</div>
		</div>
	</div>
</div>
<?php if($freebies){ ?>
<div id="freebies" class="section">
	<div class="container">
		<div class="heading-section">
			<div class="lbl-icon">
				<i class="icon-documents"></i>
			</div>
			<div class="heading-text">
				<h2 class="h3 title">Freebies<span>I like to make digital stuff, feel free to download</span></h2>
			</div>
		</div>
		<div class="content-section">
			
			<div class="row">
				
				<?php foreach($freebies as $freeitem){ ?> 
					
					<div class=" col-md-3 ">
						<div class="content-item">
							<a class="thumb" href="<?php echo base_url().$freeitem->pathName.'/'.$freeitem->path; ?>">
								<span class="overlay"><i class="fa fa-search"></i></span>
								<img src="<?php echo base_url().'/uploads/library/'.$freeitem->picture; ?> " alt="<?php echo $freeitem->title; ?>" />
							</a>
							<div class="text">
								<div class="desc">
									<h3 class="title h5">
										<a href="<?php echo base_url().$freeitem->pathName.'/'.$freeitem->path; ?>">
											<?php echo $freeitem->title; ?>											
										</a>
									</h3>
									<div class="short-desc">
										<span><?php echo $freeitem->excerpt; ?></span>
									</div>
									<div class="meta">
										<a href="<?php echo base_url().$freeitem->pathName; ?>"><?php echo $freeitem->categoryTitle; ?></a>
									</div>								
								</div>
								<div class="lbl">
									<span>FREE</span>
								</div>
							</div>							
						</div>
					</div>
				
				
				<?php } ?>
				
				
				
			</div>
			<br>
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="<?php echo base_url().'freebies'; ?>" class="btn btn-default btn-success">More Freebies</a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<ul class="home-freebies-categories">
						<?php foreach($freebies_category as $freecategory){ ?> 
							
							<li><a href="<?php echo base_url().$freecategory->pathName; ?>"><?php echo $freecategory->title; ?></a></li>						
						
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php } ?>
<?php if($blogs){ ?> 
<div id="blogs" class="section">
	<div class="container">
		<?php foreach($blogs as $blog){ ?> 
			<div class="col-md-4">
				<div class="content-item">
							<a class="thumb" href="<?php echo base_url().$blog->pathName.'/'.$blog->path; ?>">
								<span class="overlay"><i class="fa fa-search"></i></span>
								<img src="<?php echo base_url().'/uploads/library/'.$blog->picture; ?> " alt="<?php echo $blog->title; ?>" />
							</a>
							<div class="text">
								<div class="desc">
									<h3 class="title h5">
										<a href="<?php echo base_url().$blog->pathName.'/'.$blog->path; ?>">
											<?php echo $blog->title; ?>											
										</a>
									</h3>
									<div class="short-desc">
										<span><?php echo $blog->excerpt; ?></span>
									</div>
									<div class="meta">
										<a href="<?php echo base_url().$blog->pathName; ?>"><?php echo $blog->categoryTitle; ?></a>
									</div>								
								</div>
								<div class="lbl">
									<span><?php echo date("M/y", strtotime($blog->datePublished)); ?></span>
								</div>
							</div>							
						</div>
			</div>
		<?php } ?>
	</div>	
</div>
<?php } ?>