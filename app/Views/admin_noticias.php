<?= $this->extend('app') ?>
<?= $this->extend('admin') ?>

<?= $this->section('content') ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.verModalNoticia').on('click',function() {
            $id = $(this).attr('id').substring(4, $(this).attr('id').length);
            $('h1#titularNoticia').text(document.getElementById('titular_'+$id).value);
            $('p#idNoticia').text('ID: ' + $id);
            $('p#fechaNoticia').text('Fecha de publicación: ' + document.getElementById('fecha_'+$id).value);
            $('p#autorNoticia').text(document.getElementById('nombre_autor_'+$id).innerHTML);
            $('p#cuerpoNoticia').text(document.getElementById('cuerpo_'+$id).value);
            $('p#slugNoticia').text('Slug: ' + document.getElementById('slug_'+$id).value);
            $('p#categoriaNoticia').text('Categoría: ' + (document.getElementById('categorias_'+$id).value).split('_')[1]);
			$('#modalNoticiaVer').modal('show');
		});
        $('.editarModalNoticia').on('click',function() {
            $id = $(this).attr('id').substring(7, $(this).attr('id').length);
            $('input[type=text]#titularNoticia').val(document.getElementById('titular_'+$id).value);
            $('input[type=text]#idNoticia').val($id);
            $('input[type=text]#idNoticiaDisabled').val($id);
            $('input[type=text]#fechaNoticia').val(document.getElementById('fecha_'+$id).value);
            $('input[type=text]#fechaNoticiaDisabled').val(document.getElementById('fecha_'+$id).value);
            $('input[type=text]#autorNoticia').val(document.getElementById('autor_'+$id).value);
            $('input[type=text]#autorNoticiaDisabled').val(document.getElementById('nombre_autor_'+$id).innerHTML.substr(9));
            $('textarea#cuerpoNoticia').val(document.getElementById('cuerpo_'+$id).value);
            $('input[type=text]#slugNoticia').val(document.getElementById('slug_'+$id).value);
            $('input[type=text]#slugNoticiaDisabled').val(document.getElementById('slug_'+$id).value);
            $('#categoriaNoticia').val((document.getElementById('categorias_'+$id).value).split('_')[0]).change();
			$('#modalNoticiaEditar').modal('show');
		});
		$('.cerrarModal').on('click', function() {
			$("#modalNoticiaEditar").modal("hide"); 
            $("#modalNoticiaVer").modal("hide"); 
		});
        $('.crearNoticia').on('click', function() {
            $('input[type=text]#titularNoticia').val('');
            $('input[type=text]#idNoticia').val('');
            $('input[type=text]#fechaNoticia').val('');
            $('input[type=text]#autorNoticia').val('<?php echo(session('usuario')); ?>');
            $('input[type=text]#autorNoticiaDisabled').val('<?php for ($i = 0; $i < sizeof($usuarios); $i++) { if (strcmp(session('usuario'), $usuarios[$i]['id']) == 0) { echo($usuarios[$i]['Usuario']); } } ?>');
            $('textarea#cuerpoNoticia').val('');
            $('input[type=text]#slugNoticia').val('');
			$("#modalNoticiaEditar").modal("show"); 
		});
	});
</script>

<section>
    <button type="button" class="btn btn-success btn-sm crearNoticia" style="width:100%;"><i class="fas fa-plus-circle"></i> Nueva noticia</button>
    <?php if (is_array($noticias) && sizeof($noticias) > 0) {
        for ($i = 0; $i < sizeof($noticias); $i++) { 
            $id = $noticias[$i]['id'];?>
            <div>
                <div style="clear:both;">
                    <h1 style="float: left; width:80%; margin-bottom:15px;"><?php echo($noticias[$i]['Titular']); ?></h1>
                    <input type="hidden" id="titular_<?php echo($id);?>" value="<?php echo($noticias[$i]['Titular']); ?>">
                    <form action="<?php echo(base_url('/admin/noticias')); ?>" method="POST">
                        <input type="hidden" name="id_<?php echo($id);?>" id="id_<?php echo($id);?>" value="<?php echo($id); ?>">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="float: right;width:20%;margin:17px 0px;">
                            <button type="button" id="ver_<?php echo($id);?>" class="btn btn-primary btn-sm verModalNoticia" data-toggle="modal" data-target="#modalNoticiaVer"><i class="fas fa-eye"></i></button>
                            <button type="button" id="editar_<?php echo($id);?>" class="btn btn-primary btn-sm editarModalNoticia" data-toggle="modal" data-target="#modalNoticiaEditar"><i class="fas fa-edit"></i></button>
                            <button type="submit" id="borrar_<?php echo($id);?>" class="btn btn-danger btn-sm submit"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </form>
                </div>
                <div style="width:90%">
                    <p>
                        <?php if (strlen($noticias[$i]['Cuerpo']) > 200) {
                            echo(substr($noticias[$i]['Cuerpo'], 0, 200) . ' ...');
                        } else {
                            echo($noticias[$i]['Cuerpo']);
                        } ?>
                    </p>
                </div>
                <input type="hidden" id="cuerpo_<?php echo($id);?>" value="<?php echo($noticias[$i]['Cuerpo']); ?>">
                <p>Fecha de publicación: <?php echo($noticias[$i]['Fecha']); ?></p>
                <?php if ($noticias[$i]['usuarios_id'] != NULL) {
                    if (sizeof($usuarios) > 0 && sizeof($usuarios) > 0) {
                        for ($j = 0; $j < sizeof($usuarios); $j++) { 
                            if (strcmp($usuarios[$j]['id'], $noticias[$i]['usuarios_id']) == 0) { ?>
                                <p id="nombre_autor_<?php echo($id);?>">Autor/a: <?php echo($usuarios[$j]['Usuario']); ?></p>
                                <input type="hidden" id="autor_<?php echo($id);?>" value="<?php echo($usuarios[$j]['id']); ?>">
                            <?php }
                        }
                    }
                } else { ?>
                    <p id="nombre_autor_<?php echo($id);?>">Autor/a: -- </p>
                    <input type="hidden" id="autor_<?php echo($id);?>" value="--">
                <?php } ?>
                <input type="hidden" id="fecha_<?php echo($id);?>" value="<?php echo($noticias[$i]['Fecha']); ?>">
                <input type="hidden" id="slug_<?php echo($id);?>" value="<?php echo($noticias[$i]['Slug']); ?>">
                <?php if (sizeof($categorias) > 0 && sizeof($noticias_categorias) > 0) {
                    for ($j = 0; $j < sizeof($noticias_categorias); $j++) { 
                        if (strcmp($noticias_categorias[$j]['noticias_id'], $id) == 0) {
                            for ($k = 0; $k < sizeof($categorias); $k++) {
                                if (strcmp($categorias[$k]['id'], $noticias_categorias[$j]['noticias_categorias_id']) == 0) { ?>
                                    <p>Categoría: <?php echo($categorias[$k]['Nombre']); ?></p>
                                    <input type="hidden" id="categorias_<?php echo($id);?>" value="<?php echo($categorias[$k]['id'] . '_' . $categorias[$k]['Nombre']); ?>">
                                <?php }
                            }
                        }
                    }
                } ?>
                </br>
            </div>
        <?php }
    } else {
        echo("<div class='alert alert-danger' role='alert'>
                No hay ninguna noticia publicada. Empiece a crear nuevas noticias para poder verlas.
            </div>");
    }?>
	
</section>

<!-- Modal -->
<div class="modal fade" id="modalNoticiaEditar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar noticia</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo(base_url('/admin/noticias')); ?>" method="POST">
                    <div class="form-group">
                        <label>Titular: </label>
                        <input type="text" class="form-control" name="titularNoticia" id="titularNoticia"/>
                    </div>
                    <div class="form-group">
                        <label>Slug: <i class="fas fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" title="Se actualiza una vez guardados los cambios." data-content="Información sobre Slug." data-original-title=""></i></label>
                        <input type="text" class="form-control" id="slugNoticiaDisabled" disabled/>
                        <input type="hidden" class="form-control" name="slugNoticia" id="slugNoticia"/>
                    </div>
					<div class="form-group">
                        <label>ID: </label>
                        <input type="text" class="form-control" id="idNoticiaDisabled" disabled/>
                        <input type="hidden" class="form-control" name="idNoticia" id="idNoticia"/>
                    </div>
                    <div class="form-group">
                        <label>Fecha de publicación: </label>
                        <input type="text" class="form-control"id="fechaNoticiaDisabled" disabled/>
                        <input type="hidden" class="form-control" name="fechaNoticia" id="fechaNoticia"/>
                    </div>
                    <div class="form-group">
                        <label>Autor/a: </label>
                        <input type="text" class="form-control" id="autorNoticiaDisabled" disabled/>
                        <input type="hidden" class="form-control" name="autorNoticia" id="autorNoticia"/>
                    </div>
                    <div class="form-group">
                        <label>Categoria: </label>
                        <select name="categoriaNoticia" id="categoriaNoticia" class="form-select form-select-lg mb-3">
                            <?php for ($i = 0; $i < sizeof($categorias); $i++) {?>
                                <option value="<?php echo($categorias[$i]['id']);?>"><?php echo($categorias[$i]['Nombre']); ?> </option>
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

<div class="modal fade" id="modalNoticiaVer" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Noticia</h4>
            </div>
            <div class="modal-body">
                <h1 id="titularNoticia" style="width:100%; margin-bottom:15px;"></h1>
                <p id="idNoticia"></p>
                <p id="cuerpoNoticia"></p>
                <p id="fechaNoticia"></p>
                <p id="autorNoticia"></p>
                <p id="slugNoticia"></p>
                <p id="categoriaNoticia"> </p>
                <div>
                    <button type="button" class="btn btn-default cerrarModal" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>