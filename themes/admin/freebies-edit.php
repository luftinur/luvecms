<div class="inner-content">
	<div class="inner-heading col-md-12">
			<div class="left-heading">
				<h3 class="title" style="text-transform: capitalize;"><?php echo $pageTitle; ?></h3>
				
			</div>		
			<div class="right-heading text-right">
				<a href="<?php echo base_url().'admin/'.$postType.'/new'; ?>" class="btn btn-sm btn-default">Add New</a>
			</div>
			
	</div>
	<div class="inner-wrapper">
		<div class="col-md-8">
			<div class="panel panel-default content">
				<div class="panel-heading">
					Content
				</div>
				<div class="panel-body">
					<div class="form form-vertical">
						<div class="form-group">
							<input placeholder="Title" type="text" class="form-control no-resize" id="inputTitle" value="<?php echo $content->title; ?>" />
						</div>
						<div class="form-group">
							<small>Permalink : <a target="_blank" href="<?php echo base_url(); ?><?php echo $content->category > 0 ? $content->categoryName.'/'.$content->path: "uncategorized/"; ?>"><?php echo base_url(); ?><?php echo $content->category > 0 ? $content->categoryName.'/'.$content->path: "uncategorized/"; ?></a></small>
						</div>
						<div class="form-group">
							<textarea class="form-control" id="inputBody" rows="10"><?php echo $content->body; ?></textarea>
						</div>
					</div>
					
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Excerpt <em class="text-sm">/ Short Description </em>
				</div>
				<div class="panel-body">
					<textarea id="inputExcerpt" class="form-control no-resize" rows='5'><?php echo $content->excerpt; ?></textarea>
				</div>
			</div>
			
			
			
<?php if($galleryUpload){ ?> 
	<?php if($content->id > 0) { ?> 
		<div class="panel panel-default">
			<div class="panel-heading">
							
					<span class="btn btn-success fileinput-button">
						<i class="glyphicon glyphicon-plus"></i>
						<span>Upload Gallery</span>
						<!-- The file input field used as target for the file upload widget -->
						<input id="inputFiles" type="file" name="files" multiple>
					</span>
			
				
			</div>
			<div class="panel-body">
				<?php if($photos){ ?> 
			 		<div id="galleries">			 			
			 			<div class="row">
			 				<?php foreach($photos as $photo): ?> 
			 					<div class="col-md-4">
			 						<div class="gallery-item">
					 					<div class="thumbs">
					 						<a id="deletePhotos" onclick="_deletePhotos(this,<?php echo $photo->id; ?>)"  href="javascript:;"><i class="fa fa-trash"></i></a>			 							
					 						<img src="<?php echo $templateUrl.'/images/blank.png'; ?>" style="background-image:url(<?php echo base_url().'uploads/gallery/'.$photo->name.'.'.$photo->extension; ?>)" class="img-responsive" />					 						
					 					</div>
			 																 								
										<div class="input-group">
									      <span class="input-group-btn">			 								
									        <button class="btn btn-primary"  onclick="_saveCaption(this,<?php echo $photo->id; ?>)"  type="button"><i class="fa fa-save"></i></button>
									      </span>
									      <input type="text" id="caption<?php echo $photo->id; ?>" value="<?php echo @$photo->description; ?>" class=" form-control"  placeholder="Caption">
									    </div><!-- /input-group -->
									   		   
									    
			 						</div>
			 					</div>
			 				<?php endforeach; ?>		 				
			 			</div>		 			
			 		</div>
			 	<?php } ?>
			</div>
		</div>
		
	<?php } ?>
			 	
<script>var upload_url = "<?php echo base_url(); ?>admin/media?task=uploadgallery&id=<?php echo $content->id; ?>";</script>
<script src="<?php echo $templateUrl.'/js/media-upload.js'; ?>"></script>
		
<?php } ?>

			
			
						
		</div>
		
		<div class="col-md-4">
			<!-- Publish Panel -->
			<div class="panel panel-default content">
				<div class="panel-heading">				
					<small>
						Status : <?php echo $statusPost[$content->status]; ?>
					</small>
				</div>
				<div class="panel-body">
					<?php if($content->id > 0){ ?> 
					<a  href="javascript:;" id="moveToTrash" title="Move To Trash" class="pull-left btn btn-danger"><i class="fa fa-trash"></i></a>
					<?php } ?>
					
					<a href="javascript:;" id="savePublish" title="Publish Post" class="pull-right btn btn-success">Publish</a>
					
					<a href="javascript:;" style="margin-right:5px;" id="saveDraft" title="Publish Later" class="pull-right btn btn-default">Draft</a>
					
				</div>
			</div>
			<!-- Featured Image -->
			<div class="panel panel-default">
				<div class="panel-heading">
					Feature Image
				</div>
				<div class="panel-body">
					<div id="featuredImage" class="thumbs">
		 				<div style="background-image:url('<?php echo base_url().'uploads/library/'.$content->picture; ?>');"></div>
		 				<input type="hidden" id="inputFeaturedImage" value="<?php echo $content->picture; ?>" />
		 			</div>		 		
				</div>
			</div>
			
			<!-- CAtegories -->
			<div class="panel panel-default">
				<div class="panel-heading">
					Categories
				</div>
				<div class="panel-body">
					<select id="inputCategories" class="form-control">
						<option value="0">Uncategorized</option>
						<?php if($haveSubcategory){ ?> 
							
							<?php foreach($categories as $term){ ?> 
							
									<?php if($term->id == $content->category){ ?> 
										<option value="<?php echo $term->id; ?>" selected><?php echo $term->title; ?></option>
									<?php }else{ ?> 
										<option value="<?php echo $term->id; ?>"><?php echo $term->title; ?></option>
									<?php } ?>
							<?php } ?>
							
						<?php }else{ ?> 
							
							<?php foreach($categories as $term){ ?> 
								<?php if($term->parent != 0){ ?> 
									<?php if($term->id == $content->category){ ?> 
										<option value="<?php echo $term->id; ?>" selected><?php echo $term->title; ?></option>
									<?php }else{ ?> 
										<option value="<?php echo $term->id; ?>"><?php echo $term->title; ?></option>
									<?php } ?>
								<?php } ?>
							<?php } ?>
							
						<?php } ?>
						
						
					</select>
				</div>
				
				
			</div>
			
			<!-- TAGS -->
			<div class="panel panel-default">
				<div class="panel-heading">
					Tags
				</div>
				<div class="panel-body">				
					<textarea data-role="tagsinput" id="inputTags" class="form-control v-resize"></textarea>
				</div>
			</div>
			
			<div class="panel panel-freebies panel-default">
				
				<div class="panel-heading">
					Download Link
				</div>
				
				<div class="panel-body">				
					<input type="text" name="metaDownloadLink" value="<?php echo @$content->postMeta['metaDownloadLink']; ?>"  class="form-control" id="metaDownloadLink" />
				</div>
				
			</div>
			
			<div class="panel panel-freebies panel-default">
				
				<div class="panel-heading">
					Preview Link
				</div>
				
				<div class="panel-body">				
					<input type="text" name="metaPreviewLink" value="<?php echo @$content->postMeta['metaPreviewLink']; ?>"  class="form-control" id="metaPreviewLink" />
				</div>
				
			</div>	
			
			
			
		</div>
	</div>
</div>

<script type="text/javascript">

tinymce.init({
	selector: '#inputBody',
	relative_urls: false,
    remove_script_host: false,
    plugins: [
        "advlist autolink lists link image charmap anchor",
        "searchreplace visualblocks code",
        "insertdatetime paste"
    ],
    toolbar: " btn_media | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link"
	, setup: function(editor) {
		editor.addButton('btn_media', {
           // text: 'Image',
            icon: 'image',
            onclick: function() {
                isAddFeaturedImg = false;
				$("#mediaDialog").modal("show");
            }
        });
   }
});
</script>

<?php include_once "inc.mediadialog.php"; ?>

<script>
	
	$("#inputTags").tagsInput();
	<?php if(isset($tagList) && !empty($tagList)){ ?>				
		$("#inputTags").importTags('<?php echo isset($tagList) ? implode(",", $tagList) : ""; ?>');	
	<?php } ?>
	var postData = {
		id: <?php echo $content->id; ?>,
		task : '',
		category : <?php echo $content->category; ?>,
		postMeta : {}
	}
	

	$("#savePublish").on("click", function(){		
		postData.status = 1;
		savePost();		
	});
	
	$("#saveDraft").on("click", function(){
		postData.status = 0;
		savePost();
	});
	
	// save post
	function savePost(){
		var inputTitle = $("#inputTitle"),
			inputBody = tinyMCE.activeEditor.getContent(),
			inputfeaturedImage = $("#inputFeaturedImage");
		
		postData.task = 'save';
		postData.title = inputTitle.val().trim();
		// check body 
		if(inputBody !=''){
			postData.body = inputBody;
		}else{
			alert("Please Input Body Text");
			return;
		}
		
		// FREEBIES 
		if($(".panel-freebies").length){
			postData.postMeta['metaDownloadLink'] = $("#metaDownloadLink").val().trim();
			postData.postMeta['metaPreviewLink'] = $("#metaPreviewLink").val().trim();
		}		
		
		
		
		
		postData.excerpt = $("#inputExcerpt").val().trim();
		
		postData.tags = $("#inputTags").val().trim();
		// alert(postData.tags);
		// return false;
		postData.category = $("#inputCategories").val();
		// check featured image
		postData.picture = inputfeaturedImage.val();
		
		
		$.post(base_url + 'admin/<?php echo $postType; ?>', postData, function(ret){
			
		if(ret.id){
			
			location.href= base_url +'admin/<?php echo $postType; ?>/edit?id='+ret.id;
			//	location.reload(base_url + 'admin/posts/edit?id='+ret.id);
			
		}
			
		},"json");		
		
	}
	
</script>

<script src="<?php echo $templateUrl.'/js/media.js'; ?>"></script>
