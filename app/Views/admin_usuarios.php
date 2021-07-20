<?= $this->extend('app') ?>
<?= $this->extend('admin') ?>

<?= $this->section('content') ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.verModalUsuario').on('click',function() {
            $id = $(this).attr('id').substring(4, $(this).attr('id').length);
            $('h1#usuarioUsuario').text(document.getElementById('nombre_'+$id).value);
            $('p#idUsuario').text('ID: ' + $id);
            $('p#emailUsuario').text(document.getElementById('email_'+$id).value);
            $('p#contrasenaUsuario').text(document.getElementById('contrasena_'+$id).value);
			$('#modalUsuarioVer').modal('show');
		});
		$('.editarModalUsuario').on('click',function(){
			$id = $(this).attr('id').substring(7, $(this).attr('id').length);
            $('input[type=text]#usuarioUsuario').val(document.getElementById('nombre_'+$id).value);
            $('input[type=text]#idUsuario').val(document.getElementById('id_'+$id).value);
			$('input[type=text]#idUsuarioDisabled').val(document.getElementById('id_'+$id).value);
			$('input[type=email]#emailUsuario').val(document.getElementById('email_'+$id).value);
			$('input[type=text]#contrasenaUsuario').val(document.getElementById('contrasena_'+$id).value);
			$('#modalUsuarioEditar').modal('show');
		});
		$('.cerrarModal').on('click', function() {
			$("#modalUsuarioEditar").modal("hide"); 
			$("#modalUsuarioVer").modal("hide"); 
		});
		$('.crearUsuario').on('click', function() {
            $('input[type=text]#usuarioUsuario').val('');
            $('input[type=text]#idUsuario').val('');
			$('input[type=text]#emailUsuario').val('');
            $('input[type=text]#contrasenaUsuario').val('');
			$("#modalUsuarioEditar").modal("show"); 
		});
	});
</script>

<?php
	$url_base ="/PruebaAcceso_Benat/public";
?>

<section>
	<button type="button" class="btn btn-success btn-sm float-left crearUsuario"><i class="fas fa-plus-circle"></i> Nuevo/a Usuario/a</button>
	<?php if (is_array($usuarios) && sizeof($usuarios) > 0) {	
        for ($i = 0; $i < sizeof($usuarios); $i++) { 
            $id = $usuarios[$i]['id'];?>
			<div>
				<div style="clear:both;">
					<h1 style="float: left; width:80%; margin-bottom:15px;"><?php echo($usuarios[$i]['Usuario']); ?></h1>
					<input type="hidden" id="nombre_<?php echo($id);?>" value="<?php echo($usuarios[$i]['Usuario']); ?>">
					<form action="<?php echo(base_url($url_base.'/admin/usuarios')); ?>" method="POST">
						<input type="hidden" name="id_<?php echo($id);?>" id="id_<?php echo($id);?>" value="<?php echo($usuarios[$i]['id']); ?>">
						<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="float: right;width:20%;margin:17px 0px;">
							<button type="button" id="ver_<?php echo($id);?>" class="btn btn-primary btn-sm verModalUsuario" data-toggle="modal" data-target="#modalUsuarioVer"><i class="fas fa-eye"></i></button>
							<button type="button" id="editar_<?php echo($id);?>" class="btn btn-primary btn-sm editarModalUsuario" data-toggle="modal" data-target="#modalUsuarioEditar"><i class="fas fa-edit"></i></button>
							<button type="submit" id="borrar_<?php echo($id);?>" class="btn btn-danger btn-sm submit"><i class="fas fa-trash-alt"></i></button>
						</div>
					</form>
				</div>
				<p>Email: <?php echo($usuarios[$i]['Email']); ?></p>
				<input type="hidden" id="email_<?php echo($id);?>" value="<?php echo($usuarios[$i]['Email']); ?>">
                <input type="hidden" id="contrasena_<?php echo($id);?>" value="<?php echo($usuarios[$i]['Contrasena']); ?>">
			</div>
		<?php }
    } else {
        echo("<div class='alert alert-danger' role='alert'>
                No hay ningún/a usuario/a creado. Empiece a crear nuevos/as usuarios/as para poder verlos/as.
            </div>");
    }?>
	
</section>

<!-- Modal -->
<div class="modal fade" id="modalUsuarioEditar" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Editar Usuario/a</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo(base_url($url_base.'/admin/usuarios')); ?>" method="POST">
					<div class="form-group">
						<label>Usuario: </label>
						<input type="text" class="form-control" name="usuarioUsuario" id="usuarioUsuario"/>
					</div>
					<div class="form-group">
						<label>ID: </label>
						<input type="text" class="form-control" id="idUsuarioDisabled" disabled/>
						<input type="hidden" class="form-control" name="idUsuario" id="idUsuario"/>
					</div>
					<div class="form-group">
						<label>Email: </label>
						<input type="email" class="form-control" name="emailUsuario" id="emailUsuario"/>
					</div>
					<div class="form-group">
						<label>Constraseña: </label>
						<input type="text" class="form-control" name="contrasenaUsuario" id="contrasenaUsuario"/>
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

<div class="modal fade" id="modalUsuarioVer" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Usuario</h4>
            </div>
            <div class="modal-body">
                <h1 id="usuarioUsuario" style="width:100%; margin-bottom:15px;"></h1>
                <p id="idUsuario"></p>
                <p id="emailUsuario"></p>
                <p id="contrasenaUsuario"></p>
                <div>
                    <button type="button" class="btn btn-default cerrarModal" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>