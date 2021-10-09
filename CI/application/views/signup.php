
<?php echo form_open(base_url().'signup/validate_signup'); ?>
	<div class="col-6 offset-3" style="padding: 5rem;">
		<h1 class="text-center"><?php echo $signUp?></h1>

		<div class="form-group">
			<label><?php echo $username?></label>
			<input type="text" class="form-control" name="username" placeholder="<?php echo $username?>">
			<?php echo form_error('username'); ?>
		</div>

		<div class="form-group">
			<label><?php echo $password?></label>
			<input type="password" class="form-control" name="password" placeholder="<?php echo $password?>">
			<?php echo form_error('password'); ?>
		</div>

		<div class="form-group">
			<label><?php echo $email?></label>
			<input type="text" class="form-control" name="email" placeholder="<?php echo $email?>">
			<?php echo form_error('email'); ?>
		</div>

		<!-- buttons -->
		<div class="form-group" style="margin-top: 30px;">
			<button type="submit" class="btn btn-outline-primary btn-block">
				<?php echo $create?>
			</button>
		</div>

		<div class="form-group">
			<a role="button" class="btn btn-outline-info btn-block" href="<?php echo base_url(); ?>login"> 
				<?php echo $haveAccount?>
			</a>
		</div>

		<div class="clearfix">
			<label style="text-align: justify; font-size: 12px;">
				<input type="checkbox" name="agreement">
					<?php echo $terms?>
			</label>
			<?php echo form_error('agreement'); ?>
		</div> 
	</div>
	
<?php echo form_close(); ?>
