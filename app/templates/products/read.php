<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<h2><?= $title ?></h2>
	<dl>
		<dt>Nom</dt>
		<dd><?= $product['name'] ?></dd>

		<dt>Description</dt>
		<dd><?= $product['description'] ?></dd>

		<dt>Image</dt>
		<dd><?= $product['image'] ?></dd>

		<dt>Prix</dt>
		<dd><?= $product['price'] ?></dd>

	</dl>

	<a href="<?= $this->url('product_update', ["id"=> $product['id']]) ?>">Modifier</a>
	<a href="<?= $this->url('product_delete', ["id"=> $product['id']]) ?>">Supprimer</a>
<?php $this->stop('main_content') ?>