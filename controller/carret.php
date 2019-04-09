<?php 

require_once("model/products.php");

if(isset($_GET['option'])) {
	$option = $_GET['option'];

	if($option == "mostrar") {
		$elements = join(',', array_keys($_SESSION['carrito']));
		
		if (!empty($elements)) {
			$carret = mostrarCarret($conn, $elements);
			require_once("view/carret.php");
		}
		
	}
	else if ($option == "afegir") {
		$id_producte = $_GET['prod'];
		if (array_key_exists($id_producte, $_SESSION['carrito'])) {
			$_SESSION['carrito'][$id_producte] += 1;
		}
		else {
			$_SESSION['carrito'][$id_producte] = 1;
		}
		echo array_sum($_SESSION['carrito']);
	}

	else if ($option == "eliminar") {
		$id_producte = $_GET['prod'];
		$_SESSION['carrito'][$id_producte] -= 1;
		if ($_SESSION['carrito'][$id_producte] == 0) {
			unset($_SESSION['carrito'][$id_producte]);				
		}
		echo array_sum(array_values($_SESSION['carrito']));
	}
	else if ($option == "comprar") {

		if (!empty($_SESSION['carrito'])) {
			$elements = array();
			foreach ($_SESSION['carrito'] as $k => $v) {
				for($i=0; $i < $v; $i++) {
					array_push($elements, $k);
				}
			}
			$elem = join(",",$elements);
			$data = date ("Y-m-d", time());
			guardarCompra($conn, $elem, $data, $_SESSION['id']);
			unset($_SESSION['carrito']);
			$_SESSION['carrito'] = array();	
		}
		
		echo array_sum(array_values($_SESSION['carrito']));
		header("location : index.php");
	}
}
?>