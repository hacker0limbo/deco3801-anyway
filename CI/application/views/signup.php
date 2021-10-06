
<?php echo form_open(base_url().'signup/validate_signup'); ?>
	<div class="col-6 offset-3" style="padding: 5rem;">
		<h1 class="text-center">Sign up</h1>

		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Username">
			<?php echo form_error('username'); ?>
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
			<?php echo form_error('password'); ?>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" class="form-control" name="new_email" placeholder="Email">
			<?php echo form_error('email'); ?>
		</div>

		<!-- buttons -->
		<div class="form-group" style="margin-top: 30px;">
			<button type="submit" class="btn btn-outline-primary btn-block">
				Create Account
			</button>
		</div>

		<div class="form-group">
			<a role="button" class="btn btn-outline-info btn-block" href="<?php echo base_url(); ?>login"> 
				Have an account? Log in now
			</a>
		</div>

		<div class="clearfix">
			<label style="text-align: justify; font-size: 12px;">
				<input type="checkbox" name="agreement">
					Creating an account means you’re agree with our <a href>Terms of Service</a>, <a href>Privacy
					Policy</a>, and our default <a href>Notification Settings</a>
			</label>
			<?php echo form_error('agreement'); ?>
		</div> 
	</div>
	
<?php echo form_close(); ?>
