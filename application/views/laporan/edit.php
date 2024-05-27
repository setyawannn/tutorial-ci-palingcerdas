<?php $this->load->view('templates/header'); ?>

<div class="container">
	<h1 class="mt-4">Edit Laporan</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('LaporanController/update/' . $laporan->id); ?>
	<div class="form-group">
		<label for="judul">Judul</label>
		<input type="text" class="form-control" name="judul" id="judul" value="<?php echo $laporan->judul; ?>">
	</div>
	<div class="form-group">
		<label for="isi">Isi</label>
		<textarea class="form-control" name="isi" id="isi"><?php echo $laporan->isi; ?></textarea>
	</div>
	<div class="form-group">
		<label for="tanggal">Tanggal</label>
		<input type="datetime-local" class="form-control" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d\TH:i', strtotime($laporan->tanggal)); ?>">
	</div>
	<button type="submit" class="btn btn-primary">Update</button>
	<?php echo form_close(); ?>
	<a href="<?php echo site_url('LaporanController'); ?>" class="btn btn-secondary mt-2">Back to Laporan List</a>
</div>

<?php $this->load->view('templates/footer'); ?>