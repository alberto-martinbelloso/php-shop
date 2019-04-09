<?php
	require_once("model/products.php");

	$category = $_GET['category'];

	$marcas = getMarcas($conn,$category);

	if (isset($_GET['brand'])) {
		$marca = $_GET['brand'];
		if ($marca == 'totes') {
			$productes = getProducts($conn,$category);

		}
		else {
			if (!isset($_GET['prod'])) {
				$productes = getProducteMarcas($conn,$category,$marca);
			}
			else {
				require_once("view/details.php");
			}
		}
	}
	else {
		$productes = getProducts($conn,$category);
	}
	require_once("view/marcas.php");
	require_once("view/products.php");
 ?>
