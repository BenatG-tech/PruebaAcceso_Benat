<?= $this->extend('admin') ?>

<?= $this->section('content') ?>

<section>
	<div>
		<h1>Nombre del usuario</h1>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
			<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
		</div>
		<h3>Email</h3>
		<h3>Contraseña</h3>
	</div>
	
</section>

<?= $this->endSection() ?>