<?php $this->load->view('templates/header'); ?>

<div class="container">
	<h1 class="mt-4">Create Laporan</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('LaporanController/store'); ?>
	<div class="form-group">
		<label for="judul">Judul</label>
		<input type="text" class="form-control" name="judul" id="judul">
	</div>
	<div class="form-group">
		<label for="isi">Isi</label>
		<textarea class="form-control" name="isi" id="isi"></textarea>
	</div>
	<div class="form-group">
		<label for="tanggal">Tanggal</label>
		<input type="datetime-local" class="form-control" name="tanggal" id="tanggal">
	</div>
	<button type="submit" class="btn btn-primary">Create</button>
	<?php echo form_close(); ?>
	<a href="<?php echo site_url('LaporanController'); ?>" class="btn btn-secondary mt-2">Back to Laporan List</a>
</div>

<?php $this->load->view('templates/footer'); ?>