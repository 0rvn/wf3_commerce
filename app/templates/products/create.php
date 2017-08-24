<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<div>
		<h2><?= $title ?></h2>
	</div>

	<?php include('form.php'); ?>
<?php $this->stop('main_content') ?>

