<?php 
	require_once("model/products.php");

	if (isset($_GET['id'])) {
		$product = $_GET['id'];
		$details = productDetails($conn, $product);
		$details = $details[0];

		require_once("view/details.php");
	}

?>