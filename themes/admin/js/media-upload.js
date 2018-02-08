
	
	// upload photos
	 $('#inputFiles').fileupload({
        url: upload_url,
        dataType: 'json',
        done: function (e, data) {
        	console.log(data.result.files);
        	// console.log(e);
            $.each(data.result.files, function (index, file) {
                //$('<p/>').text(file.name).appendTo('#files');
              		location.reload(); 
            });
            				
            
        },
        progressall: function (e, data) {
        	
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');


	
function _deletePhotos(el, photoId){
		
		$.post(base_url + "admin/media?task=deletephoto", {id:photoId}, function(ret){
			// console.log(ret);			
		},'json').done(function(ret){
				location.reload();
		});
		
		
	}
	
	
function _saveCaption(el, photoId){
		var $caption = $("#caption"+photoId).val().trim();
		
			
		$.post(base_url + "admin/media?task=savecaption", {id:photoId, caption:$caption}, function(ret){
			// console.log(ret);
		
			
		},'json').done(function(ret){
			//	location.reload();
		});
		
		
	}
