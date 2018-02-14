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
				<div class="col-md-8 article detail">
						<div class="meta">
							<span class="datepublish"><i class="fa fa-calendar-alt"></i> <?php echo date("M d, Y", strtotime($content->datePublished)); ?></span>
							<span class="author"><i class="fa fa-user"></i> <?php echo $content->first_name == 'Admin' ? "Lufti" : "" ; ?></span>
						</div>
						<div class="image-preview">
							<img src="<?php echo base_url().'uploads/library/'.$content->picture; ?>" alt="<?php echo $content->title; ?>" />
						</div>
						<div class="content">
							<div class="social-share">
								<ul>
									<li>
										<a id="shareFacebook" onclick="window.open('https://www.facebook.com/dialog/feed?app_id=1189761114404793&display=popup&caption=Palmia&link=<?php echo base_url().$content->pathName.'/'.$content->path; ?>&redirect_uri=<?php echo base_url().$content->pathName.'/'.$content->path; ?>', 'facebook-share', 'width=600, height=500');" href="javascript:;"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li>
										<a id="shareTwitter" onclick="window.open('https://twitter.com/home?status=Palmia%20http://www.palmia.co.id%20via%20@luftinurfahmi,&related=Lufti','ttshare','width=600, height=500')" href="javascript:;"><i class="fab fa-twitter"></i></a>
									</li>
								</ul>
							</div>
							
							<div class="content-body">
								<div class="body">
									
								<?php echo $content->body; ?>
								</div>
							</div>
						
						</div>					
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
			
		</div>
	</div>
</div>
	<script>
		$(document).ready(function(){
			$(".social-share").stick_in_parent();
		});
	</script>
