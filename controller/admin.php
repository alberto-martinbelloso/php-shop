<?php 
	require_once("model/category.php");
	require_once("model/user.php");
	require_once("model/products.php");

	$categories = getCategories($conn);

//	if(($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['usuari'], $_POST['passwd']))) {

	if(isset($_GET['option'])) {

		$action = $_GET['option'];

		if ($action == "login") {
			$user = $_POST['usuari'];
			$password = $_POST['passwd'];

			$admin_id = loginUsuariAdmin($conn, $user, $password);
			if($admin_id != -1) {
				$_SESSION['id_admin'] = $admin_id;
			}
			header("Location: index.php");
		}

		else if ($action == "op_alta") {

			if(isset($_SESSION['id_admin'])) {
				$marcas = getTotesMarcas($conn);
				
				require_once("view/op_admin.php");
			}
			else echo "Vostè no és un administrador o no ha fet log-in";
		}

		else if($action == "alta") {

			if(isset($_SESSION['id_admin'])) {

				$model = $_POST['model'];
				$categoria = $_POST['cat'];
				$marca = $_POST['marca'];
				$preu = $_POST['preu'];
				$dc = $_POST['dc'];
				$dl = $_POST['dl'];
				$foto = basename($_FILES['foto']['name']);
				
				pujarProducte($conn, $model, $categoria, $preu, $foto, $marca, $dc, $dl);

				if(!isset($_SESSION['error'])) $_SESSION['message'] = "Producte pujat correctament!";				
			}
			header("location: index.php");
		}
	}

	else {
		require_once("view/admin.php");
	}
?>
