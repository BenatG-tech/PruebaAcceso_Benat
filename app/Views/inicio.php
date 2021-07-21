<?= $this->extend('app') ?>

<?= $this->section('content') ?>

<section>
	<button class="btn-lg btn-primary">
		<a href="<?= base_url('/tiempo') ?>" style="text-decoration: none" class="text-white"><i class="fas fa-cloud-sun"></i> El tiempo</a>
	</button>
	<button class="btn-lg btn-secondary">
		<a href="<?= base_url('/noticias') ?>" style="text-decoration: none" class="text-white"><i class="fas fa-newspaper"></i> Las noticias</a>
	</button>
</section>
<?= $this->endSection() ?>