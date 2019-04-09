<?php

session_start(); 
 
if (isset($_GET['action'])) {

	require_once("controller/".$_GET['action'].".php");
}

else {
	require_once("controller/index.php");
}
?>
