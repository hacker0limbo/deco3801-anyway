
<style>
	.form-group {
		margin-bottom: 10px;
	}
    .btn-primary-outline1 {
        background-color: transparent;
        border-color: #006FFF;
		color:#006FFF;
    }

	.btn-primary-outline1:hover {
        background-color: #006FFF;
        color: #FFF;
    }

    .btn-primary-outline2 {
        background-color: transparent;
        border-color: #17a2b8;
		color: #17a2b8;
    }

	.btn-primary-outline2 a {
		color: #17a2b8;
	}

	.btn-primary-outline2:hover {
        background-color: #17a2b8;
		color: #FFF;
    }
	.btn-primary-outline2:hover a { 
		text-decoration: none; 
		color: #FFF;
	}
</style>

<!-- Import google reCaptcha API -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php echo form_open(base_url().'signup/validate_signup'); ?>
	<div class="col-6 offset-3" style=" padding: 100px; margin-top: -60px;">
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
			<?php echo form_error('email'); ?>
		</div>

		<!-- buttons -->
		<div class="form-group" style="margin-top: 30px;">
			<button type="submit" class="submit-btn btn btn-primary-outline1 btn-block">
				Create Account
			</button>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary-outline2 btn-block">
				<a href="<?php echo base_url(); ?>login"> Have an account? Log in now</a>
			</button>
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
