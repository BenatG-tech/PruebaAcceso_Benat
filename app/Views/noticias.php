<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<?php
	$url_base ="/PruebaAcceso_Benat/public";
	$route_actual = substr(current_url(), 32);
	$colores = ['btn-primary', 'btn-secondary', 'btn-success', 'btn-danger', 'btn-warning', 'btn-info', 'btn-dark'];
?>

<section>
	<p>Filtrar por categoría:<p>
	<?php if (sizeof($categorias) > 0) { ?>
		<div style="clear:both">
			<?php for ($i = 0; $i < sizeof($categorias); $i++) {
				$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
				$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
				$nombre_categoria = str_replace($no_permitidas, $permitidas ,$categorias[$i]['Nombre']);
				$nombre_categoria = strtr(strtolower(trim($nombre_categoria)), " ", "-");
				?>
				<form action="<?php echo(base_url($url_base.'/noticias/categoria' . '/' . $nombre_categoria)); ?>" method="POST" style="float:left; margin-left:10px;">
					<button type="submit" class="btn <?php if ($i < count($colores)) {
							echo($colores[$i]);
						} else {
							$j = $i % count($colores);
							echo($colores[$j]);
						}?> btn-sm submit" id="<?php echo($categorias[$i]['Nombre'] . "_" . $categorias[$i]['id']); ?>"> <?php echo($categorias[$i]['Nombre']); ?></button>
				</form>
			<?php } ?>
		</div>
		
	<?php } else  {
		echo("<div class='alert alert-danger' role='alert'>
                No hay ninguna categoría creada.
            </div>");
	} ?>

	<?= $this->renderSection('content') ?>
	
</section>
<?= $this->endSection() ?>