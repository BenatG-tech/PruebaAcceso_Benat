<?= $this->extend('app') ?>
<?= $this->extend('admin') ?>

<?= $this->section('content') ?>

<script type="text/javascript">
	$(document).ready(function(){
        $('.verModalCategoria').on('click',function() {
            $id = $(this).attr('id').substring(4, $(this).attr('id').length);
            $('h1#nombreCategoria').text(document.getElementById('nombre_'+$id).value);
            $('p#idCategoria').text('ID: ' + $id);
			$('#modalCategoriaVer').modal('show');
		});
		$('.editarModalCategoria').on('click',function(){
            $id = $(this).attr('id').substring(7, $(this).attr('id').length);
            $('input[type=text]#nombreCategoria').val(document.getElementById('nombre_'+$id).value);
            $('input[type=text]#idCategoria').val(document.getElementById('id_'+$id).value);
            $('input[type=text]#idCategoriaDisabled').val(document.getElementById('id_'+$id).value);
			$('#modalCategoriaEditar').modal('show');
		});
		$('.cerrarModal').on('click', function() {
			$("#modalCategoriaEditar").modal("hide");
            $("#modalCategoriaVer").modal("hide");  
		});
        $('.crearCategoria').on('click', function() {
            $('input[type=text]#nombreCategoria').val('');
            $('input[type=text]#idCategoria').val('');
			$("#modalCategoriaEditar").modal("show"); 
		});
	});
</script>

<?php
	$url_base ="/PruebaAcceso_Benat/public";
?>

<section>
    <button type="button" class="btn btn-success btn-sm float-left crearCategoria"><i class="fas fa-plus-circle"></i> Nueva Categoría</button>
    <?php if (is_array($categorias) && sizeof($categorias) > 0) {
        for ($i = 0; $i < sizeof($categorias); $i++) { 
            $id = $categorias[$i]['id'];?>
            <div>
                <div style="clear:both;">
                    <h1 style="float: left; width:80%; margin-bottom:15px;"><?php echo($categorias[$i]['Nombre']); ?></h1>
                    <input type="hidden" id="nombre_<?php echo($id);?>" value="<?php echo($categorias[$i]['Nombre']); ?>">
                    <form action="<?php echo(base_url($url_base.'/admin/categorias')); ?>" method="POST">
                        <input type="hidden" name="id_<?php echo($id);?>" id="id_<?php echo($id);?>" value="<?php echo($categorias[$i]['id']); ?>">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="float: right;width:20%;margin:17px 0px;">
                            <button type="button" id="ver_<?php echo($id);?>" class="btn btn-primary btn-sm verModalCategoria" data-toggle="modal" data-target="#modalCategoriaVer"><i class="fas fa-eye"></i></button>
                            <button type="button" id="editar_<?php echo($id);?>" class="btn btn-primary btn-sm editarModalCategoria" data-toggle="modal" data-target="#modalCategoriaEditar"><i class="fas fa-edit"></i></button>
                            <button type="submit" id="borrar_<?php echo($id);?>" class="btn btn-danger btn-sm submit"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        <?php }
    } else {
        echo("<div class='alert alert-danger' role='alert'>
                No hay ninguna categoría creada. Empiece a crear nuevas categorias para poder verlas.
            </div>");
    }?>
	
</section>

<!-- Modal -->
<div class="modal fade" id="modalCategoriaEditar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar categoría</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo(base_url($url_base.'/admin/categorias')); ?>" method="POST">
                    <div class="form-group">
                        <label >Nombre: </label>
                        <input type="text" class="form-control" name="nombreCategoria" id="nombreCategoria"/>
                    </div>
					<div class="form-group">
                        <label>ID: </label>
                        <input type="text" class="form-control" id="idCategoriaDisabled" disabled/>
                        <input type="hidden" class="form-control" name="idCategoria" id="idCategoria"/>
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
<div class="modal fade" id="modalCategoriaVer" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Categoría</h4>
            </div>
            <div class="modal-body">
                <h1 id="nombreCategoria" style="width:100%; margin-bottom:15px;"></h1>
                <p id="idCategoria"></p>
                <div>
                    <button type="button" class="btn btn-default cerrarModal" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>