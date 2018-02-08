



<div id="mediaDialog" class="modal">
    <div class="modal-dialog">
            <div class="panel panel-default content">
              <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Insert Media</h4>
                  
              </div>
              <div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="0"
					  aria-valuemin="0" aria-valuemax="100" style="">
					    
					  </div>
					</div> 
              <div class="panel-body">    	
              	<div id="mediaContent" class="col-md-8">
              		
              	</div>
              	<div class="col-md-4">
              		
              	</div>
              			
              </div>
              <div class="panel-footer">
                  <div class="btn btn-success fileinput-button">
				        <i class="fa fa-plus"></i>
				        <span>Upload Files</span>
				        <!-- The file input field used as target for the file upload widget -->
				        <input id="fileupload" type="file" name="files" multiple>
				    </div>
				    
                <a href="javascript:;" id="insertMedia" class="pull-right btn btn-primary">Insert</a>
              </div>
            </div>
            
    </div>    
</div>
        

<script>

    // Change this to the location of your server-side upload handler:
    var url = "<?php echo base_url(); ?>admin/media?task=uploadmedia";
    var $insertMedia = $("#insertMedia");
		var $featuredImage = $("#featuredImage > div");
		var $inputFeatured = $("#inputFeaturedImage");
	
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        add: function (e, data) {
        	
	         var uploadErrors = [];
                // var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
                var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
                if(data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
                    uploadErrors.push('Not an accepted file type');
                }
                if(data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > 1072) {
                    uploadErrors.push('Filesize is too big');
                }
                if(uploadErrors.length > 0) {
                    alert(uploadErrors.join("\n"));
                } else {
                    data.submit();
                }
	    },
	    progress: function (e, data) {
          var progress = parseInt(data.loaded / data.total * 100, 10);            
          $('.progress .progress-bar').css('width',  progress + '%').removeClass("no-transition");           
        },
        done: function (e, data) {
        	console.log(data.result.files);
        	// console.log(e);
            $.each(data.result.files, function (index, file) {
                //$('<p/>').text(file.name).appendTo('#files');              		
						var item = "<div class='media-item'>"+
								   "<a href='javascript:;' data-file='"+file.name+"."+file.extension+"'>"+								   
								   "<img src='/themes/admin/images/blank.png' style='background-image:url(/uploads/library/"+file.name+"."+file.extension+");' />"+
								   "</a></div>";
								   
						$("#mediaContent").prepend(item);   
						 $(".progress .progress-bar").css({"width": "0"}).addClass("no-transition");
            });
            
            
            $("#mediaContent .media-item").each(function(){
					
					$(this).on("click", function(){
						$("#mediaContent .media-item").removeClass("selected");
						$(this).toggleClass("selected");
						
					});
					
				});
				
				
					
            
        },
         fail: function (e, data) {
         	alert(JSON.stringify(data));
            $.each(data.messages, function (index, error) {
                $('<p style="color: red;">Upload file error: ' + error + '<i class="elusive-remove" style="padding-left:10px;"/></p>')
                .appendTo('#div_files');
            });
        },
        fileuploadprogressall :  function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	       
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');


</script>
