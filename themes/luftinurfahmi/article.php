<div id="blogs" class="page">
	<div class="hero-page" style="background-image:url(<?php echo $templateUrl.'/assets/images/hero-page.jpg'; ?>)">
		<div class="container">
			<h1 class="h3 title">
				<?php echo $content->title; ?>
			</h1>
		</div>
	</div>
	<div class="content-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumbs">
						<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
						<?php foreach($breadcrumbs as $index => $breadcrumb){ ?>
							<?php if($breadcrumb != ""){ ?>
								<li><a href="<?php echo base_url() . $breadcrumb; ?>"><?php echo $index; ?></a></li>
							 <?php }else{ ?>
							 	<li><?php echo $index; ?></li>
							<?php } ?>					
						<?php } ?>				
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 article">
					<div class="image-preview">
						<img src="<?php echo base_url().'uploads/library/'.$content->picture; ?>" alt="<?php echo $content->title; ?>" />
					</div>
					
					<div class="content-body">
						<div class="body">
							
						<?php echo $content->body; ?>
						</div>
					</div>					
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
			
		</div>
	</div>
</div>
	