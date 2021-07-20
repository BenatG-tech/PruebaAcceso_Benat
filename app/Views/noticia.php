<?= $this->extend('app') ?>
<?= $this->extend('noticias') ?>

<?= $this->section('content') ?>

<?php
	$url_base ="/PruebaAcceso_Benat/public";
	$route_actual = substr(current_url(), 41); //slug
?>

<section>
	<?php for ($i = 0; $i < sizeof($noticias); $i++) { 
		if (strcmp($noticias[$i]['Slug'], $route_actual) == 0) { ?>
			<div>
				<div style="clear:both;">
					<h1 style="float: left; width:100%; margin-bottom:15px;"><?php echo($noticias[$i]['Titular']); ?></h1>
					<div style="width:90%">
						<p> <?php echo($noticias[$i]['Cuerpo']); ?> </p>
					</div>
					<p>Fecha de publicación: <?php echo($noticias[$i]['Fecha']); ?></p>
					<?php if (sizeof($categorias) > 0 && sizeof($noticias_categorias) > 0) {
						for ($j = 0; $j < sizeof($noticias_categorias); $j++) { 
							if ((int) $noticias_categorias[$j]['noticias_id'] == (int) $id) {
								for ($k = 0; $k < sizeof($categorias); $k++) {
									if ((int) $categorias[$k]['id'] == (int) $noticias_categorias[$j]['noticias_categorias_id']) { 
										$nombre_categoria = strtr(strtolower(trim($categorias[$k]['Nombre'])), " ", "-");
										?>
										<form action="<?php echo(base_url($url_base.'/noticias/categoria' . '/' . $nombre_categoria)); ?>" method="POST">
											<p>Categoría: <button type="submit" id="<?php echo($categorias[$k]['Nombre']); ?>_<?php echo($categorias[$k]['id']); ?>" class="btn btn-light btn-sm submit"><?php echo($categorias[$k]['Nombre']); ?></button></p>
										</form>
									<?php }
								}
							}
						}
					} ?>
				</div>
				</br>
			</div>
		<?php } 
	} ?>
	
</section>
<?= $this->endSection() ?>