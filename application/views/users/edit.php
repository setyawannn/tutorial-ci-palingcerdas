<?php $this->load->view('templates/header'); ?>

<div class="container">
	<h1 class="mt-4">Edit User</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('UserController/update/' . $user->id); ?>
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name" id="name" value="<?php echo $user->name; ?>">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" name="email" id="email" value="<?php echo $user->email; ?>">
	</div>
	<div class="form-group">
		<label for="password">Password (leave blank to keep current password)</label>
		<input type="password" class="form-control" name="password" id="password">
	</div>
	<div class="form-group">
		<label for="role">Role</label>
		<select class="form-control" name="role" id="role">
			<option value="user" <?php echo $user->role == 'user' ? 'selected' : ''; ?>>User</option>
			<option value="admin" <?php echo $user->role == 'admin' ? 'selected' : ''; ?>>Admin</option>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Update</button>
	<?php echo form_close(); ?>
	<a href="<?php echo site_url('UserController'); ?>" class="btn btn-secondary mt-2">Back to Users List</a>
</div>

<?php $this->load->view('templates/footer'); ?>