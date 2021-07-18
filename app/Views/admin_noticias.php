<?= $this->extend('app') ?>
<?= $this->extend('admin') ?>

<?= $this->section('content') ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.abrirModalNoticia').on('click',function(){
			$('#modalNoticia').modal('show');
		});
		$('.cerrarModal').on('click', function() {
			$("#modalNoticia").modal("hide"); 
		});
	});
</script>

<section>
	<div>
		<h1>Titulo de ejemplo</h1>
		<p>ID noticia</p>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="button" class="btn btn-primary btn-sm abrirModalNoticia" data-toggle="modal" data-target="#modalNoticia"><i class="fas fa-edit"></i></button>
			<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
		</div>
		<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at blandit ligula, et vulputate quam. 
			Donec nulla augue, rutrum sit amet nulla eget, egestas imperdiet urna. Vestibulum vitae elit eu risus consequat viverra. 
			Donec pulvinar lectus ut tellus viverra convallis. Etiam tortor ante, eleifend eget nisl eu, aliquam pulvinar mi. 
			Vivamus aliquet volutpat lobortis. Sed vestibulum massa id metus ultrices egestas. Suspendisse tempor laoreet nisi, et consequat dolor efficitur elementum. 
			Sed pellentesque massa ac eros vulputate tincidunt. Morbi laoreet faucibus lacus.<br>
			Nunc id tincidunt nibh, in vestibulum est. In leo lacus, tristique vitae interdum vitae, ultrices ultrices orci. 
			Vivamus enim arcu, dapibus sit amet velit sed, suscipit vulputate magna. Etiam posuere venenatis arcu ac commodo. 
			Quisque ultrices lacus lectus, nec viverra quam pretium eu. Sed fringilla vel ex sed pellentesque. 
			Integer vitae luctus mauris, ut tincidunt nisi. Sed cursus tortor felis.</p>
	</div>
	
</section>

<!-- Modal -->
<div class="modal fade" id="modalNoticia" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar noticia</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label for="tituloNoticia">Título: </label>
                        <input type="text" class="form-control" id="tituloNoticia"/>
                    </div>
					<div class="form-group">
                        <label for="idNoticia">ID: </label>
                        <input type="text" class="form-control" id="idNoticia"/>
                    </div>
                    <div class="form-group">
                        <label for="categoriaNoticia">Categoria: </label>
                        <input type="email" class="form-control" id="categoriaNoticia"/>
                    </div>
                    <div class="form-group">
                        <label for="textoNoticia">Texto: </label>
                        <textarea class="form-control" id="textoNoticia"></textarea>
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