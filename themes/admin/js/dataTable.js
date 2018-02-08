	
	function change_status(a, rowId, url){
		var elem = $(a);
		var s = elem.data("status");
		
		elem.children().removeClass("fa-check");
		elem.children().addClass("fa-spin fa-spinner");
		
		if(rowId > 0){
			
			$.post(base_url+url,{task:'changestatus', id: rowId, status: s}, function(ret){
				
				if(s == 1){
					elem.data("status", 0);
					elem.removeClass("status-1");
					elem.addClass("status-0");					
				}else if(s == 0){
					elem.data("status", 1);
					elem.removeClass("status-0");
					elem.addClass("status-1");
					
				}
				elem.children().addClass("fa-check");
				elem.children().removeClass("fa-spin fa-spinner");
		
				
			},"json");
						
			
		}
		
	}
	
	function move_to_trash(a, rowId, url){
		var elem = $(a);
		
		elem.children().removeClass("fa-check");
		elem.children().addClass("fa-spin fa-spinner");
		
		if(rowId > 0){
			
			$.post(base_url+url,{task:'trash', id: rowId, status: 0}, function(ret){
				
				//if(ret){
					
					elem.parent().parent().remove();
					
			//	}
				location.reload();
				
			},"json");
			
			
			
		}
		
	}