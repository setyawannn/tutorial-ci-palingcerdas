<?php $this->load->view('templates/header'); ?>

<div class="container">
	<h1 class="mt-4">Users List</h1>
	<a href="<?php echo site_url('UserController/create'); ?>" class="btn btn-primary mb-2">Create New User</a>
	<table id="usersTable" class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user) : ?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->name; ?></td>
					<td><?php echo $user->email; ?></td>
					<td><?php echo $user->role; ?></td>
					<td>
						<a href="<?php echo site_url('UserController/edit/' . $user->id); ?>" class="btn btn-warning btn-sm">Edit</a>
						<button class="btn btn-danger btn-sm btn-delete" data-id="<?php echo $user->id; ?>">Delete</button>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const deleteButtons = document.querySelectorAll('.btn-delete');

		deleteButtons.forEach(button => {
			button.addEventListener('click', function() {
				const userId = this.getAttribute('data-id');
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = '<?php echo site_url('UserController/delete/'); ?>' + userId;
					}
				});
			});
		});
	});
</script>

<?php $this->load->view('templates/footer'); ?>