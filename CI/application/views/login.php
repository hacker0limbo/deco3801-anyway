<?php echo form_open(base_url().'login/validate_login');?>
	<div class="col-6 offset-3" style="padding: 5rem;">
		<!-- Display only when new user sign up successfully -->
		<?php if($this->session->flashdata('signup')): ?>
			<?php echo '<p class="alert alert-success" style="text-align: center;">'.$this->session->flashdata('signup').'</p>'; ?>
		<?php endif; ?>

		<h1 class="text-center">Log in</h1>

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

		<!-- buttons -->
		<div class="form-group">
			<button type="submit" class="btn btn-outline-primary btn-block">
				Log in
			</button>
			
		</div>

		<div class="form-group">
			<a role="button" class="btn btn-outline-info btn-block" href="<?php echo base_url(); ?>signup"> 
				Don't have an account? Sign up here 
			</a>
		</div>

		<div class="clearfix">
			<label class="float-left form-check-label"><input type="checkbox" name="remember"> Remember me</label>
			<a href="<?php echo base_url(); ?>forgot" class="float-right">Forgot Password?</a>
		</div> 
	</div>
<?php echo form_close(); ?>
