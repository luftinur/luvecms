<div id="tags" class="page">
	<div class="hero-page" style="background-image:url(<?php echo $templateUrl.'/assets/images/hero-page.jpg'; ?>)">
		<div class="container">
			<h1 class="h3 title">
				Tags	
			</h1>
		</div>
	</div>
	
	<div class="content">
		<div class="container">
			<ul class="taglist">
			<?php foreach($tags as $tag){ ?> 
				<li>
					<a href="<?php echo base_url().'tags/'.$tag->tagName; ?>" class="btn btn-primary"><?php echo $tag->tagTitle; ?> <span class="badge badge-default"><?php echo $tag->numContents; ?></span></a>
				</li>
			<?php } ?>
			</ul>
		</div>
	</div>
</div>