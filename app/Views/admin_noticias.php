<?= $this->extend('app\admin') ?>
<?= $this->extend('admin') ?>

<?= $this->section('content') ?>

<section>
	<div>
		<h1>Titulo de ejemplo</h1>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
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

<?= $this->endSection() ?>