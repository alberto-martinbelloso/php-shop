<?php 

	require_once("model/user.php");

	if(isset($_GET['option'])) {
		$accio = $_GET['option'];

		if($accio == "login") {

			if (isset($_POST['user'], $_POST['passwd'])) {

				$user = $_POST['user'];
				$password = $_POST['passwd'];

				$user_id = loginUsuari($conn, $user, $password);

				if($user_id != -1) {
					$_SESSION['id'] = $user_id;
					$_SESSION['carrito'] = array();
					$_SESSION['message'] = "Benvingut " . $user . "!";
				}
				else {
					$_SESSION['error'] = "Log In incorrecte";
				}
			}
		}
		else if ($accio == "logout") {
			unset($_SESSION['id']);
			unset($_SESSION['id_admin']);
			unset($_SESSION['carrito']);	
		}
		header("Location: index.php");
	}
?>