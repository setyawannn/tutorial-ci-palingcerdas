<?php $this->load->view('templates/header'); ?>

<div class="container">
	<h1 class="mt-4">Create User</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('UserController/store'); ?>
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name" id="name">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" name="email" id="email">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" id="password">
	</div>
	<div class="form-group">
		<label for="role">Role</label>
		<select class="form-control" name="role" id="role">
			<option value="user">User</option>
			<option value="admin">Admin</option>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Create</button>
	<?php echo form_close(); ?>
	<a href="<?php echo site_url('UserController'); ?>" class="btn btn-secondary mt-2">Back to Users List</a>
</div>

<?php $this->load->view('templates/footer'); ?>