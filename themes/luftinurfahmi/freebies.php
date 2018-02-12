<div id="freebies" class="page">
	<div class="hero-page" style="background-image:url(<?php echo $templateUrl.'/assets/images/hero-page.jpg'; ?>)">
		<div class="container">
			<h1 class="h3 title">
				<?php echo $title; ?>
				<span>I like to make digital stuff, feel free to download</span>				
			</h1>
		</div>
	</div>
	
	
	<div class="content-page">
				<!-- FREEBIES CATEGORY -->
		<div class="catnav">
			<div class="container">
				<div id="categorylist" class="col-md-12">
					<ul>
						<?php foreach($categoryLists as $category){ ?> 
							<?php if($category->parent == 0){ ?>
								<li>
									<a href="<?php echo base_url().$category->pathName; ?>">All</a>
								</li>
							 <?php }else{ ?> 
							 	<li>
									<a href="<?php echo base_url().$category->pathName; ?>"><?php echo $category->title; ?></a>
								</li>
							 <?php } ?>
							
						<?php } ?>
					</ul>
				</div>
				</div>
			</div>
		<div class="container">
	
			
			
			<div class="padding-10"></div>
			
			<div id="contents" class="row">
				<?php foreach($items as $item){ ?> 
					
					<div class="item-pagination col-xs-6 col-md-3">
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
									<div class="meta">
										<a href="<?php echo base_url().$item->pathName; ?>"><?php echo $item->categoryTitle; ?></a>
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
			
			<?php if($num_results > $pagePerContents){ ?> 
				<?php 
				
				
				if($current_page < $totalPages){ ?> 
					<div class="text-center">
						<a href="javascript:;" data-totalPages = "<?php echo $totalPages; ?>" data-page="<?php echo $current_page; ?>" id="loadMore" class="btn btn-success btn-sm">Load More</a>
					
					</div>
				<?php } ?>
			<?php } ?>
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
		var yourNavigation = $(".catnav");
		    stickyDiv = "sticky";
		    categorybar = $('.catnav').height();
		
		$(window).scroll(function() {
		  if( $(this).scrollTop() > categorybar ) {
		    $('.catnav').addClass(stickyDiv);
		  } else {
		    $('.catnav').removeClass(stickyDiv);
		  }
		});
</script>


