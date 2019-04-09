<?php 
	
	require_once("model/db.php");
	require_once("model/products.php");

	if(isset($_GET['text'])) {
		$search = $_GET['text'];

		$productes = buscar($conn, $search);

		require_once("view/products.php");
	}

?>