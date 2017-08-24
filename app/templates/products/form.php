<form method="post">
	<div>
		<label for="name">Nom</label>
		<input type="text" id="name" name="name" value="<?= $name ?>">
	</div>

	<div>
		<label for="description">Description</label>
		<input type="textarea" id="description" name="description" rows="8" cols="80" value="<?= $description ?>">
	</div>

	<div>
		<label for="image">Image</label>
		<input type="text" id="image" name="image" value="<?= $image ?>">
	</div>

	<div>
		<label for="price">Prix</label>
		<input type="text" id="price" name="price" value="<?= $price ?>">
	</div>
	<button type="submit">Enregistrer</button>
</form>
