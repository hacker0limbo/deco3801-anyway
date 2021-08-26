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
			<button type="submit" class="btn btn-primary-outline1 btn-block">
				<a style="color: #006FFF;"> Log in </a>
			</button>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary-outline2 btn-block">
				<a style="color: #17a2b8;" href="<?php echo base_url(); ?>signup"> Don't have an account? Sign up here </a>
			</button>
		</div>

		<div class="clearfix">
			<label class="float-left form-check-label"><input type="checkbox" name="remember"> Remember me</label>
			<a href="<?php echo base_url(); ?>forgot" class="float-right">Forgot Password?</a>
		</div> 
	</div>
	
<?php echo form_close(); ?>
