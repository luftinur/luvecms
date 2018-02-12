<div id="blogs" class="page">
	<div class="hero-page" style="background-image:url(<?php echo $templateUrl.'/assets/images/hero-page.jpg'; ?>)">
		<div class="container">
			<h1 class="h3 title">
				<?php echo $title; ?>
				<span>Writing is the part of learning and getting knowledge</span>				
			</h1>
		</div>
	</div>
	<div class="content-page">
		
		<div class="container">		
			
			<div class="padding-10"></div>
			<div class="col-md-8">
				<div id="contents" class="row">
					<?php foreach($items as $item){ ?> 
						
						<div class="item-pagination col-md-6">
							<div class="content-item">
								<a class="thumb" href="<?php echo base_url().$item->pathName.'/'.$item->path; ?>">
									<span class="overlay"><i class="fa fa-search"></i></span>
									<img src="<?php echo base_url().'/uploads/library/'.$item->picture; ?> " alt="<?php echo $item->title; ?>" />
								</a>
								<div class="text">
									<div class="desc">
										<h3 class="title h5">
											<a href="<?php echo base_url().$item->pathName.'/'.$item->path; ?>">
												<?php echo $item->title; ?>											
											</a>
										</h3>
										<div class="short-desc">
											<span><?php echo $item->excerpt; ?></span>
										</div>						
									</div>
									
								</div>							
							</div>
						</div>
					
					
					<?php } ?>
				</div>
				
					<?php if($num_results > $pagePerContents){ ?> 
						<?php if($current_page < $totalPages){ ?> 
							<div class="text-center">
								<a href="javascript:;" data-totalPages = "<?php echo $totalPages; ?>" data-page="<?php echo $current_page; ?>" id="loadMore" class="btn btn-success btn-sm">Load More</a>
							</div>
						<?php } ?>
					<?php } ?>
				
				
			</div>
			<div class="col-md-4">
				
			</div>
	</div>
	
	</div>
	
</div>
	
<script>
		
	var path_url = "<?php echo base_url().uri_string(); ?>";
	
	$(document).ready(function(){
		
		
		
		var $loadMore = $("#loadMore");
		var $contents = $("#contents");
		
		if($loadMore.length){
			var page = $loadMore.data('page');
			    totalPages = $loadMore.data("totalPages");
			    
			$loadMore.on("click", function(){
				
				page = page + 1;
				$loadMore.text("").append("<i class='fa fa-spinner fa-spin'></i>");
				setTimeout(function(){ 
				$.get( path_url  + '/' + (page ? page :'') ,function(html)
						 {
							 var items = $($.parseHTML(html)).find(".item-pagination");
							 var btnMore =  $($.parseHTML(html)).find("#loadMore");
							
							 if(items.length){
								  items.each(function(index){
								  	 $contents.append(items[index]);
								  });
								  if(btnMore.length){
								  	$loadMore.find('i').remove();
								  	
								  	$loadMore.text("Load More");
								  	
								  	$loadMore.data("page", page);								  
								  }else{
								  	 $loadMore.remove();
								  }
	 							
							 }else{
								 $loadMore.remove();
							 }				
						
						});
					 },300);
				
			});
			
		}
		
		
		
	
		
	});
		
</script>