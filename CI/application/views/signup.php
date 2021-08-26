<style>
    .btn-primary-outline1 {
        background-color: transparent;
        border-color: #006FFF;
    }

    .btn-primary-outline2 {
        background-color: transparent;
        border-color: #17a2b8;
    }
</style>

<div class="col-6 offset-3" style=" padding: 100px; margin-top: -40px;">
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
			<input type="text" class="form-control" name="email" placeholder="Email">
		</div>

		<!-- buttons -->
		<div class="form-group">
			<button type="submit" class="btn btn-primary-outline1 btn-block">
				<a style="color: #006FFF;"> Create Account </a>
			</button>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary-outline2 btn-block">
				<a style="color: #17a2b8;" href="<?php echo base_url(); ?>register/register">Have an account? Sign in now</a>
			</button>
		</div>

		<div class="clearfix form-group">
			<label class="form-check-label"><input type="checkbox" name="remember"> Creating an account means you’re okay with our <a href>Terms of Service</a>, <a href>Privacy
            Policy</a>, and our default <a href>Notification Settings</a></label>
		</div> 
	</div>
	
<?php echo form_close(); ?>
