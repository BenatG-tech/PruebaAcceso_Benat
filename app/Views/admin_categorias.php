<?= $this->extend('app') ?>
<?= $this->extend('admin') ?>

<?= $this->section('content') ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.abrirModalCategoria').on('click',function(){
			$('#modalCategoria').modal('show');
		});
		$('.cerrarModal').on('click', function() {
			$("#modalCategoria").modal("hide"); 
		});
	});
</script>

<section>
	<div>
		<h1>Nombre de categoría</h1>
		<p>ID categoría</p>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="button" class="btn btn-primary btn-sm abrirModalCategoria" data-toggle="modal" data-target="#modalCategoria"><i class="fas fa-edit"></i></button>
			<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
		</div>
	</div>
	
</section>

<!-- Modal -->
<div class="modal fade" id="modalCategoria" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar categoria</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label for="tituloNoticia">Nombre: </label>
                        <input type="text" class="form-control" id="tituloNoticia"/>
                    </div>
					<div class="form-group">
                        <label for="idCategoria">ID: </label>
                        <input type="text" class="form-control" id="idCategoria"/>
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