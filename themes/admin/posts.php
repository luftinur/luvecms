
	<div class="inner-content">
		
		<div class="inner-heading">
			<div class="left-heading">
				<h3 class="title" style="text-transform:capitalize;"><?php echo $pageTitle; ?></h3>
				<a href="<?php echo base_url().'admin/posts/new'; ?>" class="btn btn-sm btn-default">Add New</a>
			</div>		
			
			<div class="left-heading text-right">
				<div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" style="text-transform:capitalize;" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    <?php echo isset($_GET['filter']) ? $_GET['filter']. ' Posts' : 'Filter Posts'; ?>
				    <i class="fa fa-sort-amount-asc"></i>
				  </button>
				  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
				  	<li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2); ?>">All</a></li>
				    <li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'?filter=draft'; ?>">Draft</a></li>
				    <li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'?filter=publish'; ?>">Published</a></li>
				    <li role="separator" class="divider"></li>
				  	 <li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'?filter=trash'; ?>">Trash</a></li>
				  </ul>
				</div>
			</div>			
		</div>
		
		<div class="panel content">
			
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th></th>
						<th>Author</th>						
						<th>Categories</th>
						<th>Date Published</th>
						<th>Date Modified</th>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach($items as $index => $item): ?>
						
						<tr>
							<td>
								<input type="checkbox" id='bulkaction' name='bulkaction[]' value="<?php echo $item->id; ?>">
							</td>
							<td>
								<?php echo $item->picture != NULL ? '<i class="fa fa-image" style="color:#9f9f9f; margin-right:5px;"></i>' : '<span style="margin-right:20px; display:inline-block;"></span>'  ?>
								<a href="<?php echo base_url().'admin/'.$postType.'/edit?id='.$item->id; ?>"><?php echo $item->title; ?></a>
							</td>
							<td>
								<a href="javascript:;" data-status="<?php echo $item->status; ?>" title="Change Status" onclick="_status(this,<?php echo $item->id; ?>)" id="status" al class="status-<?php echo $item->status; ?>"><i class="fa fa-check"></i></a>
								&nbsp;
								<a href="javascript:;" id="trash" title="Move To Trash" onclick="_trash(this, <?php echo $item->id; ?>)"><i class="fa fa-trash-o"></i></a>
							</td>
							<td><?php echo $item->username; ?></td>
							<td><?php echo $item->categoryTitle; ?></td>
							<td><?php echo date("d-M-Y", strtotime($item->datePublished)); ?></td>
							<td><?php echo date("d-M-Y", strtotime($item->dateModified)); ?></td>
						</tr>
						
						 
					<?php endforeach; ?>
				</tbody>
			</table>	
			<div class="pagination-wrapper">
				<?php echo $pagination; ?>
			</div>
			
				
		</div>
	
	</div>


<script>
	function _status(a, id){
		
		change_status(a, id, "admin/<?php echo $postType; ?>");
		
	}
	
	function _trash(a, id){
		
		move_to_trash(a, id, "admin/<?php echo $postType; ?>");
		
	}
</script>
