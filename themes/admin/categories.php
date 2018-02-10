
	<div class="inner-content">
		
		<div class="inner-heading">
			
			<div class="left-heading">
				<h3 class="title" style="text-transform:capitalize;"><?php echo $pageTitle; ?></h3>
			</div>		
		
						
		</div>
		<div class="col-md-8" style="padding-left:0px;">
			
			<div class="panel content">
				<table class="table table-condensed table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Path</th>	
							<th></th>				
						</tr>
					</thead>
					<tbody>
						<?php foreach($items as $index => $item): ?>
							
							<tr>
								<td>
									
									<input type="checkbox" id='bulkaction' name='bulkaction[]' value="<?php echo $item->id; ?>">
									
								</td>
								
								<td><a href="javascript:;"><?php echo $item->title; ?></a></td>
								<td><?php echo $item->pathName; ?></td>
								<td>
									
									<a href="javascript:;" data-status="<?php echo $item->status; ?>" title="Change Status" onclick="_status(this,<?php echo $item->id; ?>)" id="status" al class="status-<?php echo $item->status; ?>"><i class="fa fa-check"></i></a>
									&nbsp;
									<a href="javascript:;" id="trash" title="Move To Trash" onclick="_trash(this, <?php echo $item->id; ?>)"><i class="fa fa-trash-o"></i></a>
									
								</td>
								
								
							</tr>
							
							 
						<?php endforeach; ?>
					</tbody>
				</table>	
				
				
				<div class="pagination-wrapper">
					<?php echo $pagination; ?>
				</div>			
			</div>	
	
		</div>
		<div class="col-md-4" style="padding-left:0px;">
			<div class="panel panel-default">
				<div class="panel-heading">
					Insert New Categories
				</div>
				<div class="panel-body">
					<div class="form-group">
						<input placeholder="Category" type="text" class="form-control" id="inputCategories" value="" />
					</div>
					<div class="form-group">
						<label>Parent Category</label>
						<select id="inputParent" class="form-control">
								<option value="0">No Parent</option>
							<?php foreach($categories as $category){ ?> 							
								<?php if($category->parent == 0){ ?> 
									<option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
								<?php } } ?>							
						</select>
					</div>				
				
				</div>
				
				<div class="panel-footer text-right">
					<a href="javascript:;" id="btnSaveCategories" class="btn btn-success">Save</a>
				</div> 
			</div>
		</div>
	</div>


<script>
	
		

	$("#btnSaveCategories").on("click", function(){
		var postData = {
			parent : $("#inputParent").val(),
			title : $("#inputCategories").val().trim(),
			task : 'save'
		}
		
		$.post(base_url+"admin/<?php echo $this->uri->segment(2).'/'.$this->uri->segment(3); ?>", postData, function(ret){
			location.reload();
		},"json");
	});

	function _status(a, id){		
		change_status(a, id, "admin/<?php echo $this->uri->segment(2).'/'.$this->uri->segment(3); ?>");		
	}
	
	function _trash(a, id){		
		move_to_trash(a, id, "admin/<?php echo $this->uri->segment(2).'/'.$this->uri->segment(3); ?>");
		
	}
</script>
