<div class="container">
	
	<div class="login-wrapper">
		<h1 class="h3 text-center"> <i class="fa fa-lock"></i> Sign In</h1>
		<div class="form form-vertical">
			
			<form method="post" action="<?php echo base_url().'admin/login'; ?>">
				<div class="form-group">					
					<label>Email Address</label>
					<input type="email" value="" name="identity" class="form-control" id="identity" placeholder="">    
					
				</div>
				<div class="form-group">					
					<label>Password</label>
					<input type="password" value="" name="password" class="form-control" id="password" placeholder="">    
					
				</div>
				
				<button type="submit" class="btn btn-success">Sign In</button>
			</form>
		</div>
	</div>
	
	
</div>
