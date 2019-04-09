<?php
	require_once("model/products.php");

	$category = $_GET['category'];

	$marcas = getMarcas($conn,$category);

	require_once("view/marcas.php");
?>