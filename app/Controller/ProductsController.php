<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ProductsManager;


class ProductsController extends Controller
{	
	private $productsManager ;

	public function __construct()
	{
		$this->productsManager = new ProductsManager;
	}

	public function index()
	{	
		// retrieve all products
		$products = $this->productsManager->findAll();

		// Show view
		$this->show('products/index', [
			'title'=> 'Liste des produits',
			'products'=> $products
		]);
	}

	public function create()
	{
		$name = null;
		$price = null;
		$description = null;
		$image = null;

		$save = true;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    		// Récupération des données du formulaire
    		$name = $_POST['name'];
    		$description = $_POST['description'];
    		$image = $_POST['image'];
    		$price = $_POST['price'];

	        // Vérification des données
	        // ...

	    	if ($save) {
		        // Enregistrer les données dans la BDD
				$product = $this->productsManager->insert([
		        	"name" => $name,
        			"description" => $description,
        			"image" => $image,
        			"price" => $price
    			]);

	        	// Rediriger l'utilisateur vers la fiche produit
				$this->redirectToRoute('product_read', ['id' => $product['id']]);
	    	}
	    }
		
	    $this->show('products/create', [
			"title"       => 'Ajouter un produit',
        	"name"        => $name,
			"price"       => $price,
			"description" => $description,
			"image"       => $image
		]);
	}

	public function read($id)
	{	 // Get product from BDD
		$product = $this->productsManager->find($id);

		$this->show('products/read' , [
			"title"   => $product['name'],
			"product" => $product
		]);
	}

	public function update($id)
	{	// Get product from BDD
		$product = $this->productsManager->find($id);

		// Récupération des données du $_POST
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$save = true;

    		// Récupération des données du formulaire
    		$name = $_POST['name'];
    		$description = $_POST['description'];
    		$image = $_POST['image'];
    		$price = $_POST['price'];

	        // Vérification des données
	        // ...

	    	if ($save) {
		        // Enregistrer les données dans la BDD
				$this->productsManager->update([
		        	"name" => $name,
        			"description" => $description,
        			"image" => $image,
        			"price" => $price
    			], $product['id']);

	        	// Rediriger l'utilisateur vers la fiche produit
				$this->redirectToRoute('product_read', ['id' => $product['id']]);
	    	}
	    }

		// Show view xith Product data
		$this->show('products/update', [
			"title"=> "Modifier : ".$product['name'],
			"name" => $product['name'],
    		"price" => $product['price'],
    		"description" => $product['description'],
	    	"image" => $product['image'],
		]);
	}

	public function delete($id)
	{	
		// Get product from BDD
		$product = $this->productsManager->find($id);

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$this->productsManager->delete($id);
			$this->redirectToRoute('products_index');
		}

		$this->show('products/delete' , [
			"title"=> "Suppression du produit : ".$product['name'],
			"name" => $product['name'],
			"product" => $product
		]);
	}

}
