<?= $this->extend('app') ?>
<?= $this->extend('admin') ?>

<?= $this->section('content') ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.abrirModalNoticia').on('click',function() {
            $id = $(this).attr('id').substring(7, $(this).attr('id').length);
            $('input[type=text]#titularNoticia').val(document.getElementById('titular_'+$id).value);
            $('input[type=text]#idNoticia').val($id);
            $('input[type=text]#fechaNoticia').val(document.getElementById('fecha_'+$id).value);
            $('textarea#cuerpoNoticia').val(document.getElementById('cuerpo_'+$id).value);
            $('input[type=text]#slugNoticia').val(document.getElementById('slug_'+$id).value);
            $('#categoriaNoticia option[value="categoriaNoticia_' + document.getElementById('categorias_'+$id).value + '"]').attr("selected", true);
			$('#modalNoticia').modal('show');
		});
		$('.cerrarModal').on('click', function() {
			$("#modalNoticia").modal("hide"); 
		});
        $('.crearNoticia').on('click', function() {
            $('input[type=text]#titularNoticia').val('');
            $('input[type=text]#idNoticia').val('');
            $('input[type=text]#fechaNoticia').val('');
            $('textarea#cuerpoNoticia').val('');
            $('input[type=text]#slugNoticia').val('');
			$("#modalNoticia").modal("show"); 
		});
	});
</script>

<?php
	$url_base ="/PruebaAcceso_Benat/public";
?>

<section>
    <button type="button" class="btn btn-success btn-sm float-left crearNoticia"><i class="fas fa-plus-circle"></i> Nueva noticia</button>
    <?php if (is_array($noticias) && sizeof($noticias) > 0) {
        for ($i = 0; $i < sizeof($noticias); $i++) { 
            $id = $noticias[$i]['id'];?>
            <div>
                <h1><?php echo($noticias[$i]['Titular']); ?></h1>
                <input type="hidden" id="titular_<?php echo($id);?>" value="<?php echo($noticias[$i]['Titular']); ?>">
                <input type="hidden" id="id_<?php echo($id);?>" value="<?php echo($id); ?>">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" id="editar_<?php echo($id);?>" class="btn btn-primary btn-sm abrirModalNoticia" data-toggle="modal" data-target="#modalNoticia"><i class="fas fa-edit"></i></button>
                    <button type="button" id="borrar_<?php echo($id);?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </div>
                <p><?php echo($noticias[$i]['Cuerpo']); ?></p>
                <input type="hidden" id="cuerpo_<?php echo($id);?>" value="<?php echo($noticias[$i]['Cuerpo']); ?>">
                <p>Fecha de publicación: <?php echo($noticias[$i]['Fecha']); ?></p>
                <input type="hidden" id="fecha_<?php echo($id);?>" value="<?php echo($noticias[$i]['Fecha']); ?>">
                <p>Slug: <?php echo($noticias[$i]['Slug']); ?></p>
                <input type="hidden" id="slug_<?php echo($id);?>" value="<?php echo($noticias[$i]['Slug']); ?>">
                <?php if (sizeof($categorias) > 0 && sizeof($noticias_categorias) > 0) {
                    for ($j = 0; $j < sizeof($noticias_categorias); $j++) { 
                        if ((int) $noticias_categorias[$j]['noticias_id'] == (int) $id) {
                            for ($k = 0; $k < sizeof($categorias); $k++) {
                                if ((int) $categorias[$k]['id'] == (int) $noticias_categorias[$j]['noticias_categorias_id']) { ?>
                                    <p>Categorias: <?php echo($categorias[$k]['Nombre']); ?></p>
                                    <input type="hidden" id="categorias_<?php echo($id);?>" value="<?php echo($categorias[$k]['id']) ?>">
                                <?php }
                            }
                        }
                    }
                } ?>
            </div>
        <?php }
    } else {
        echo("<div class='alert alert-danger' role='alert'>
                No hay ninguna noticia publicada. Empiece a crear nuevas noticias para poder verlas.
            </div>");
    }?>
	
</section>

<!-- Modal -->
<div class="modal fade" id="modalNoticia" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar noticia</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo(base_url($url_base.'/admin/noticias')); ?>" method="POST">
                    <div class="form-group">
                        <label>Titular: </label>
                        <input type="text" class="form-control" name="titularNoticia" id="titularNoticia"/>
                    </div>
                    <div class="form-group">
                        <label>Slug: </label>
                        <input type="text" class="form-control" name="slugNoticia" id="slugNoticia"/>
                    </div>
					<div class="form-group">
                        <label>ID: </label>
                        <input type="text" class="form-control" name="idNoticia" id="idNoticia"/>
                    </div>
                    <div class="form-group">
                        <label>Fecha de publicación: </label>
                        <input type="text" class="form-control" name="fechaNoticia" id="fechaNoticia"/>
                    </div>
                    <div class="form-group">
                        <label>Categoria: </label>
                        <select name="categoriaNoticia" id="categoriaNoticia" class="form-select form-select-lg mb-3">
                            <?php for ($i = 0; $i < sizeof($categorias); $i++) {?>
                                <option value="<?php echo($categorias[$i]['id']); ?>"><?php echo($categorias[$i]['Nombre']); ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cuerpo: </label>
                        <textarea class="form-control" name="cuerpoNoticia" id="cuerpoNoticia" rows="8"></textarea>
                    </div>
                    <div>
                        <button type="button" class="btn btn-default cerrarModal" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary guardarModal submit"><i class="far fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>