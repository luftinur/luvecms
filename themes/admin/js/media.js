		var isAddFeaturedImg, isAddMedia;
		$("#featuredImage").on("click", function(){
            isAddFeaturedImg = true;
			$("#mediaDialog").modal("show");
		});
		
		$("#btn_media").on("click", function(){
			isAddFeaturedImg = false;
			$("#mediaDialog").modal("show");
			
		});
		
		var $mediaContent = $("#mediaContent");
		
		$("#mediaDialog").on("shown.bs.modal", function(){
			$mediaContent.html("");
			// load media
			$.get(base_url+'admin/media?task=getmedia', function(ret){
				
				if(ret){
				
					$(ret).each(function(i, item){
						
						var item = "<div class='media-item'>"+
								   "<a href='javascript:;' data-file='"+item.name+"."+item.extension+"'>"+								   
								   "<img src='/themes/admin/images/blank.png' style='background-image:url(/uploads/"+item.mediaType+"/"+item.name+"."+item.extension+");' />"+
								   "</a></div>";
								   
						$mediaContent.append(item);   	 
						
					});
					
				}
				
				
			},"json").done(function(){
				
				$("#mediaContent .media-item").each(function(){
					
					$(this).on("click", function(){
						$("#mediaContent .media-item").removeClass("selected");
						$(this).toggleClass("selected");
						
					});
					
				});
				
					
				$insertMedia.on("click", function(){
					 var $itemSelected = $(".media-item.selected > a");
                        var dataFile = $itemSelected.data("file");
                    if(isAddFeaturedImg){
                        

                        $featuredImage.css("background-image","url(/uploads/library/"+dataFile+")");
                        $inputFeatured.val(dataFile);

                    }else{
                        var fullUrl = "/uploads/library/"+dataFile;
                        tinymce.activeEditor.insertContent('<img src="'+ fullUrl +'" />');
                    }
                    
					
					
					$("#mediaDialog").modal("hide");
					
				});
				
				
			});
			
			
		});
		
		
        function insertMedia(){
            $insertMedia.on("click", function(){
                	 var $itemSelected = $(".media-item.selected > a");
                     var dataFile = $itemSelected.data("file");
                        
                    if(isAddFeaturedImg){
                       

                        $featuredImage.css("background-image","url(/uploads/library/"+dataFile+")");
                        $inputFeatured.val(dataFile);

                    }else{
                    	var fullUrl = base_url()+"uploads/library/"+dataFile;
                        tinymce.activeEditor.insertContent('<img src="'+ fullUrl +'" />');
                    }
                    
					
					
					$("#mediaDialog").modal("hide");
            });
        }