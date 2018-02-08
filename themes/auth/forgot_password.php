
<div class="container" style="max-width:520px;">
	
	<h1 class="h3 title text-center"><?php echo lang('forgot_password_heading');?></h1>
	<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
	
	
	<?php if($message != ''){ ?> 
		<div id="infoMessage" class="alert alert-info"><?php echo $message;?></div>
	<?php } ?>
	
	<?php echo form_open("auth/forgot_password");?>
	
	      <p>
	      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
	      	<?php echo form_input($identity);?>
	      </p>
	
	      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'),"class='btn btn-primary'");?></p>
	
	<?php echo form_close();?>
	
</div>