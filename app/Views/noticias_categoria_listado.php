<?= $this->extend('app') ?>
<?= $this->extend('noticias') ?>

<?= $this->section('content') ?>
<?php
	$url_base ="/PruebaAcceso_Benat/public";
	$route_actual = strtr(trim(substr(current_url(), 51)), "-", " "); //nombre categoria
	$cantidad_noticias = 0;
?>

<section>
	<?php for ($k = 0; $k < sizeof($categorias); $k++) { 
		$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
		$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
		$nombre_categoria = str_replace($no_permitidas, $permitidas ,$categorias[$k]['Nombre']);
		$nombre_categoria = strtr(strtolower(trim($nombre_categoria)), " ", "-");
		if (strcmp($nombre_categoria, $route_actual) == 0) {
			for ($i = 0; $i < sizeof($noticias_categorias); $i++) { 
				for ($j = 0; $j < sizeof($noticias); $j++) { 
					$id = $noticias[$j]['id'];
					if (strcmp($noticias_categorias[$i]['noticias_id'], $noticias[$j]['id'])== 0) {
						if (strcmp($noticias_categorias[$i]['noticias_categorias_id'], $categorias[$k]['id']) == 0) { 
							$cantidad_noticias += 1;?>
							<div>
								<div style="clear:both;">
									<form action="<?php echo(base_url($url_base.'/noticias' . '/' . $noticias[$j]['Slug'])); ?>" method="POST">
										<h1 style="float: left; width:80%; margin-bottom:15px;"><?php echo($noticias[$j]['Titular']); ?></h1>
										<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="float: right;width:20%;margin:17px 0px;">
											<button type="submit" id="<?php echo($id);?>" class="btn btn-primary btn-sm submit"><i class="fas fa-eye"></i> Leer noticia</button>
										</div>
									</form>
								</form>
									<div style="width:90%">
										<p>
											<?php if (strlen($noticias[$j]['Cuerpo']) > 200) {
												echo(substr($noticias[$j]['Cuerpo'], 0, 200) . ' ...');
											} else {
												echo($noticias[$j]['Cuerpo']);
											} ?>
										</p>
									</div>
									<p>Fecha de publicación: <?php echo($noticias[$j]['Fecha']); ?></p>
									<?php
										$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
										$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
										$nombre_cat = str_replace($no_permitidas, $permitidas ,$categorias[$k]['Nombre']);
										$nombre_cat = strtr(strtolower(trim($nombre_cat)), " ", "-");
										?>
									<form action="<?php echo(base_url($url_base.'/noticias/categoria' . '/' . $nombre_cat)); ?>" method="POST">
										<p>Categoría: <button type="submit" id="<?php echo($categorias[$k]['Nombre']); ?>_<?php echo($categorias[$k]['id']); ?>" class="btn btn-light btn-sm submit"><?php echo($categorias[$k]['Nombre']); ?></button></p>
									</form>
								</div>
								</br>
							</div>
						<?php }
					}
				}
			}
		}
	} 
	if ($cantidad_noticias == 0) {
		echo("<div class='alert alert-danger' role='alert'>
                No hay ninguna noticia con esa categoría asignada.
            </div>");
	} ?>
</section>
<?= $this->endSection() ?>