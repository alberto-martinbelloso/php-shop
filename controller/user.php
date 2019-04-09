<?php 

	require_once("model/user.php");

	function Validate($data) {
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripslashes($data);
	
		return $data;
	}

	function vP($data, $pat) {
		if(preg_match($pat, $data)) {
			echo '<script language="javascript">alert("match");</script>';
			return 1;	
		} 
		else {
			echo '<script language="javascript">alert("juas");</script>';
			return 0;
		}
	}

	if(isset($_GET['option'])) {
		$accio = $_GET['option'];

		if($accio == "register") {
			if (isset($_POST['nom'], $_POST['user'], $_POST['passwd'], $_POST['email'], $_POST['telefon'], $_POST['adreça'], $_POST['poblacio'], $_POST['codi_postal'], $_POST['targeta'])) {	
			
				$nom = $_POST['nom'];
				$user = $_POST['user'];
				$password = $_POST['passwd'];
				$email = $_POST['email'];
				$tlf = $_POST['telefon'];
				$adr = $_POST['adreça'];
				$poblacio = $_POST['poblacio'];
				$cp = $_POST['codi_postal'];
				$tarjeta = $_POST['targeta'];

				if( preg_match("/[a-zA-Z\s]/",$nom)&&preg_match("/[a-zA-Z0-9]/",$user)&&preg_match("/[a-zA-Z0-9]/",$password)&&preg_match("/[0-9]{9}/",$tlf)&&preg_match("/[a-zA-Z0-9\s]/",$adr)&&preg_match("/[a-zA-Z\s]/",$poblacio)&&preg_match("/[0-9]{4}/",$cp)&&preg_match("/[0-9]{16}/",$tarjeta)) {

					$nom = Validate($nom);
					$user = Validate($user);
					$password = Validate($password);
					$password = password_hash($password, PASSWORD_DEFAULT);
					$email = Validate($email);
					$tlf = Validate($tlf);
					$adr = Validate($adr);
					$poblacio = Validate($poblacio);
					$cp = Validate($cp);
					$tarjeta = Validate($tarjeta);
					//$password = password_hash($_POST['passwd'], PASSWORD_DEFAULT);

					try {
						guardarUsuari($conn, $nom, $user, $password, $email, $tlf, $adr, $poblacio, $cp, $tarjeta);
						$_SESSION['message'] = "Usuari registrat correctament!";
					}catch (Exception $e) {
	    				$_SESSION['error'] = "Aquest usuari ja existeix!";
					}
				}
				else {
				$_SESSION['error'] = "Les dades no segueixen el format correcte";
				}
			}
			header("Location: index.php");
		}

		else if($accio == "mostrar") {

			if(isset($_SESSION['id'])) {
				$id = $_SESSION['id'];
				$admin = 0;
			}
			else {
				$id = $_SESSION['id_admin'];
				$admin = 1;
			}

			$dades = getDadesUsuari($conn, $id, $admin);
			$dades = $dades[0];
			
			require_once("view/user_dades.php");
		}

		else if($accio == "canviar") {

			if (isset($_POST['nom'], $_POST['user'], $_POST['password'], $_POST['email'], $_POST['telefon'], $_POST['adreça'], $_POST['poblacio'], $_POST['codi_postal'], $_POST['targeta'])) {	

				$nom = $_POST['nom'];
				$user = $_POST['user'];
				$password = $_POST['password'];
				$email = $_POST['email'];
				$tlf = $_POST['telefon'];
				$adr = $_POST['adreça'];
				$poblacio = $_POST['poblacio'];
				$cp = $_POST['codi_postal'];
				$tarjeta = $_POST['targeta'];

				if( preg_match("/[a-zA-Z\s]/",$nom)&&preg_match("/[a-zA-Z0-9]/",$user)&&preg_match("/[a-zA-Z0-9]/",$password)&&preg_match("/[0-9]{9}/",$tlf)&&preg_match("/[a-zA-Z0-9\s]/",$adr)&&preg_match("/[a-zA-Z\s]/",$poblacio)&&preg_match("/[0-9]{4}/",$cp)&&preg_match("/[0-9]{16}/",$tarjeta)) {

					$nom = Validate($nom);
					$user = Validate($user);
					$password = Validate($password);
					$password = password_hash($password, PASSWORD_DEFAULT);
					$email = Validate($email);
					$tlf = Validate($tlf);
					$adr = Validate($adr);
					$poblacio = Validate($poblacio);
					$cp = Validate($cp);
					$tarjeta = Validate($tarjeta);

					try {
						actualitzarUsuari($conn, $_SESSION['id'], $nom, $user, $password, $email, $tlf, $adr, $poblacio, $cp, $tarjeta);
						$_SESSION['message'] = "Usuari actualitzat correctament!";
					} catch (Exception $e) {
						$_SESSION['error'] = "Aquest usuari ja existeix!";
					}
				}
				else {
					$_SESSION['error'] = "Les dades no segueixen el format correcte";
				}
			}
			header("Location: index.php");
		}
		else if ($accio == "llista_compres") {
			$compres = getCompresUsuari($conn, $_SESSION['id']);

			if(!empty($compres)) {

				require_once("model/products.php");

				foreach ($compres as $k => $v) {
					$compres[$k]['prods'] = array();
					array_push($compres[$k]['prods'], getProductesFromCompra($conn, $compres[$k]['id_productes']));
				}

				require_once("view/user_compres.php");
			}
		}
	}

?>