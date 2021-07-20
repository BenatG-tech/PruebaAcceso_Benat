<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<?php
	$url_base ="/PruebaAcceso_Benat/public";
	$route_actual = substr(current_url(), 32);
	$colores = ['btn-primary', 'btn-secondary', 'btn-success', 'btn-danger', 'btn-warning', 'btn-info', 'btn-dark'];
?>

<section>
	<p>Filtrar por categoría:<p>
	<?php if (sizeof($categorias) > 0) {
		for ($i = 0; $i < sizeof($categorias); $i++) {
			$nombre_categoria = strtr(strtolower(trim($categorias[$i]['Nombre'])), " ", "-");
			?>
			<form action="<?php echo(base_url($url_base.'/noticias/categoria' . '/' . $nombre_categoria)); ?>" method="POST">
				<button type="submit" class="btn <?php if ($i < count($colores)) {
						echo($colores[$i]);
					} else {
						$j = $i % count($colores);
						echo($colores[$j]);
					}?> btn-sm submit" id="<?php echo($categorias[$i]['Nombre'] . "_" . $categorias[$i]['id']); ?>"> <?php echo($categorias[$i]['Nombre']); ?></button>
			</form>
		<?php }
	} ?>

	<?= $this->renderSection('content') ?>
	
</section>
<?= $this->endSection() ?>