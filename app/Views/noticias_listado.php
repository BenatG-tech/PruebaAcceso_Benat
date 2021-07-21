<?= $this->extend('app') ?>
<?= $this->extend('noticias') ?>

<?= $this->section('content') ?>

<section>
	<?php if (is_array($noticias) && sizeof($noticias) > 0) {
		$empezar = 0;
		$terminar = 5;
		if (sizeof($noticias) > 6) {
			$empezar = sizeof($noticias) - 1;
			$terminar = sizeof($noticias) - 6;
		}
		for ($i = $empezar; $i > $terminar; $i--) { 
			$id = $noticias[$i]['id']; ?>
				<div>
					<div style="clear:both;">
						<form action="<?php echo(base_url('/noticias' . '/' . $noticias[$i]['Slug'])); ?>" method="POST">
							<h1 style="float: left; width:80%; margin-bottom:15px;"><?php echo($noticias[$i]['Titular']); ?></h1>
							<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="float: right;width:20%;margin:17px 0px;">
								<button type="submit" id="<?php echo($id);?>" class="btn btn-primary btn-sm submit"><i class="fas fa-eye"></i> Leer noticia</button>
							</div>
						</form>
						<div style="width:90%">
							<p>
								<?php if (strlen($noticias[$i]['Cuerpo']) > 200) {
									echo(substr($noticias[$i]['Cuerpo'], 0, 200) . ' ...');
								} else {
									echo($noticias[$i]['Cuerpo']);
								} ?>
							</p>
						</div>
						<p>Fecha de publicación: <?php echo($noticias[$i]['Fecha']); ?></p>

						<?php if (sizeof($usuarios) > 0) {
							for ($j = 0; $j < sizeof($usuarios); $j++) { 
								if (strcmp($usuarios[$j]['id'], $noticias[$i]['usuarios_id']) == 0) { ?>
									<p>Autor/a: <?php echo($usuarios[$j]['Usuario']); ?></p>
								<?php }
							}
						} ?>
						<?php if (sizeof($categorias) > 0 && sizeof($noticias_categorias) > 0) {
							for ($j = 0; $j < sizeof($noticias_categorias); $j++) { 
								if ((int) $noticias_categorias[$j]['noticias_id'] == (int) $id) {
									for ($k = 0; $k < sizeof($categorias); $k++) {
										if ((int) $categorias[$k]['id'] == (int) $noticias_categorias[$j]['noticias_categorias_id']) {
											
											$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
											$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
											$nombre_categoria = str_replace($no_permitidas, $permitidas ,$categorias[$k]['Nombre']);
											$nombre_categoria = strtr(strtolower(trim($nombre_categoria)), " ", "-");
											?>
											<form action="<?php echo(base_url('/noticias/categoria' . '/' . $nombre_categoria)); ?>" method="POST">
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
	} else {
		echo("<div class='alert alert-danger' role='alert'>
				No hay ninguna noticia publicada.
			</div>");
	}?>
	
</section>
<?= $this->endSection() ?>