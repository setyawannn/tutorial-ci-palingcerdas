<?php $this->load->view('templates/header'); ?>

<div class="container">
	<h1 class="mt-4">Login</h1>
	<?php if ($this->session->flashdata('login_error')) : ?>
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata('login_error'); ?>
		</div>
	<?php endif; ?>
	<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
	<?php echo form_open('AuthController/login_process'); ?>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" name="email" id="email">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" id="password">
	</div>
	<button type="submit" class="btn btn-primary">Login</button>
	<?php echo form_close(); ?>
</div>

<?php $this->load->view('templates/footer'); ?>