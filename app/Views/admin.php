<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<?php
	$url_base ="/PruebaAcceso_Benat/public";
	$route_actual = substr(current_url(), 32);
?>

<section>
	<!-- Añadir protección con Inicio de sesión -->
	<div class="btn-group" role="group" aria-label="Basic example">
		<button type="button" class="btn btn-secondary btn-lg" <?php if (strcmp($route_actual, 'admin/usuarios') == 0) { echo 'disabled' ;} else { ''; } ?>>
			<a href="<?= base_url($url_base.'/admin/usuarios') ?>" style="text-decoration: none" class="text-white"><i class="fas fa-users"></i> Usuarios</a>
		</button>
		<button type="button" class="btn btn-secondary btn-lg" <?php if (strcmp($route_actual, 'admin/noticias') == 0) { echo 'disabled' ;} else { ''; } ?>>
			<a href="<?= base_url($url_base.'/admin/noticias') ?>" style="text-decoration: none" class="text-white"><i class="fas fa-newspaper"></i> Noticias</a>
		</button>
		<button type="button" class="btn btn-secondary btn-lg" <?php if (strcmp($route_actual, 'admin/categorias') == 0) { echo 'disabled' ;} else { ''; } ?>>
		<a href="<?= base_url($url_base.'/admin/categorias') ?>" style="text-decoration: none" class="text-white"><i class="fas fa-list-ol"></i> Categorias</a>
	</button>
	</div>

	<div class="bg-light">
		<?= $this->renderSection('content') ?>
	</div>
	
</section>
<?= $this->endSection() ?>