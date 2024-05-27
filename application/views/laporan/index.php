<?php $this->load->view('templates/header'); ?>

<div class="container">
	<h1 class="mt-4">Laporan List</h1>
	<a href="<?php echo site_url('LaporanController/create'); ?>" class="btn btn-primary mb-2">Create New Laporan</a>
	<table id="laporanTable" class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Judul</th>
				<th>Isi</th>
				<th>Tanggal</th>
				<th>Created By</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($laporan as $lapor) : ?>
				<tr>
					<td><?php echo $lapor->id; ?></td>
					<td><?php echo $lapor->judul; ?></td>
					<td><?php echo $lapor->isi; ?></td>
					<td><?php echo $lapor->tanggal; ?></td>
					<td><?php echo $lapor->user_name; ?></td>
					<td>
						<a href="<?php echo site_url('LaporanController/edit/' . $lapor->id); ?>" class="btn btn-warning btn-sm">Edit</a>
						<button class="btn btn-danger btn-sm btn-delete" data-id="<?php echo $lapor->id; ?>">Delete</button>
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
				const laporanId = this.getAttribute('data-id');
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
						window.location.href = '<?php echo site_url('LaporanController/delete/'); ?>' + laporanId;
					}
				});
			});
		});

		$('#laporanTable').DataTable();
	});
</script>

<?php $this->load->view('templates/footer'); ?>