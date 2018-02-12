<div id="blogs" class="page">
	
	<div class="hero-page" style="background-image:url(<?php echo $templateUrl . '/assets/images/hero-page.jpg'; ?>)"></div>
	
	<div class="content-page">
		
		<div class="content-heading">
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
					<div class="col-md-6">					
						<div class="image-preview">
							<img alt="<?php echo $content -> title; ?>" src="<?php echo base_url() . 'uploads/library/' . $content -> picture; ?>" />
						</div>				
					</div>
					<div class="col-md-6">					
						<div class="text">
							<h1 class="h2 title"><?php echo $content->title; ?></h1>
							<div class="short-desc">
								<?php echo $content->excerpt; ?>
							</div>
							<div class="action">
								<a href="javascript:;" id="btnDownload" class="btn btn-success btn-lg">Download Free</a>
							</div>
							<div class="meta">
								<div><i class="fa fa-tag"></i> <a href="<?php echo base_url().$content->pathName; ?>"><?php echo $content->categoryTitle; ?></a></div>
							</div>
							
							<div class="share">								
								<a href="javascript:;" onclick="window.open('https://www.facebook.com/dialog/feed?app_id=1189761114404793&display=popup&caption=Palmia&link=<?php echo base_url().$content->pathName.'/'.$content->path; ?>&redirect_uri=<?php echo base_url().$content->pathName.'/'.$content->path; ?>', 'facebook-share', 'width=600, height=500');" class="btn btn-sm btn-primary"><i class="fab fa-facebook-f"></i></a>
								<a href="javascript:;" onclick="window.open('https://twitter.com/home?status=Palmia%20http://www.palmia.co.id%20via%20@luftinurfahmi,&related=Lufti','ttshare','width=600, height=500')" class="btn btn-sm btn-primary"><i class="fab fa-twitter"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			
			<div class="container">
			<div class="row">
				<div class="col-md-8 body">
					<?php echo $content->body; ?>
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>	
</div>
	