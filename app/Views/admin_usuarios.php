<?= $this->extend('app') ?>
<?= $this->extend('admin') ?>

<?= $this->section('content') ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.abrirModalUsuario').on('click',function(){
			$('#modalUsuario').modal('show');
		});
		$('.cerrarModal').on('click', function() {
			$("#modalUsuario").modal("hide"); 
		});
	});
</script>

<section>
	<div>
		<h1>Nombre del usuario</h1>
		<p>ID usuario</p>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="button" class="btn btn-primary btn-sm abrirModalUsuario" data-toggle="modal" data-target="#modalUsuario"><i class="fas fa-edit"></i></button>
			<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
		</div>
		<h3>Email</h3>
		<h3>Contraseña</h3>
	</div>
	
</section>

<!-- Modal -->
<div class="modal fade" id="modalUsuario" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Editar Usuario</h4>
			</div>
			
			<!-- Modal Body -->
			<div class="modal-body">
				<form role="form">
					<div class="form-group">
						<label for="nombreUsuario">Nombre: </label>
						<input type="text" class="form-control" id="nombreUsuario"/>
					</div>
					<div class="form-group">
						<label for="idUsuario">ID: </label>
						<input type="email" class="form-control" id="idUsuario"/>
					</div>
					<div class="form-group">
						<label for="emailUsuario">Email: </label>
						<input type="email" class="form-control" id="emailUsuario"/>
					</div>
					<div class="form-group">
						<label for="contrasenaUsuario">Constraseña: </label>
						<input class="form-control" id="contrasenaUsuario"/>
					</div>
				</form>
			</div>
			
			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default cerrarModal" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
				<button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()"><i class="far fa-save"></i> Guardar cambios</button>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>