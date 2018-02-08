
<div class="container" style="max-width:520px;">
	
	<h1 class="title h3 text-center"><?php echo lang('login_heading');?></h1>
	<p><?php echo lang('login_subheading');?></p>
	
	<?php if($message != ''){ ?> 
		<div id="infoMessage" class="alert alert-info"><?php echo $message;?></div>
	<?php } ?>
	
	<?php echo form_open("auth/login");?>

	  <p>
		<?php echo lang('login_identity_label', 'identity');?>
		<?php echo form_input($identity);?>
	  </p>

	  <p>
		<?php echo lang('login_password_label', 'password');?>
		<?php echo form_input($password);?>
	  </p>

	  <p>
		<?php echo lang('login_remember_label', 'remember');?>
		<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
	  </p>

	<div>
		 <p>
		 	<?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-primary"');?>
		 	<a href="forgot_password"><?php echo lang('login_forgot_password');?></a>	 	
		 </p>	
	</div>
	 

	<?php echo form_close();?>

	
</div>
