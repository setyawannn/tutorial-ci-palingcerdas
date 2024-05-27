</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<script>
	$(document).ready(function() {
		$('#usersTable, #laporanTable').DataTable();
	});

	<?php if ($this->session->flashdata('message') && $this->router->fetch_class() !== 'authcontroller' && $this->router->fetch_method() !== 'login') : ?>
		Swal.fire({
			icon: '<?php echo $this->session->flashdata('message_type'); ?>',
			title: '<?php echo $this->session->flashdata('message'); ?>'
		});
	<?php endif; ?>
</script>
</body>

</html>