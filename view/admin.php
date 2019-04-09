
<!DOCTYPE html>
<html>
<head>
	<title>E-Vechicles</title>
	<link rel="stylesheet" type="text/css" href="resources/css/index.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head> 
<body>

<?php if(isset($_SESSION['error'])) {?>
	<div class="error confirmation"> <p> <?=$_SESSION['error']?> </p> </div>
	<?php
	unset($_SESSION['error']);
	}
	if(isset($_SESSION['message'])) {?>
	<div class="message confirmation"> <p> <?=$_SESSION['message']?> </p> </div>
	<?php
		unset($_SESSION['message']);
	}?>


<header>
	<div class="buscador">
		<p class="busca"> Busca </p>
		<input type="text" class="text_b" name="buscador">	
	</div>
	<a class="inici" href="index.php"> <img class="foto_logo" src="resources/img/title-logo.png" alt=""> </a>
	<div class="menu_usuari">
		<a class="account"> My Account</a>
		<?php if(isset($_SESSION['id'])): ?>
			<a class="mostrar_carrito">Carret <div class="quantitat"><?=array_sum(array_values($_SESSION['carrito']))?></div></a>
			<div class="account_info">
				<a href="index.php?action=sessio&option=logout">Logout</a>
				<a class="llista_compres"> Compres</a>
				<a class="dades"> Dades</a>
			</div>
		<?php else: ?>
			
			<div class="account_info">
				<a class="register"> Registre</a>
				<a class="login"> Entra </a>
			</div>
		<?php endif; ?>
	</div>
</header>

<section class="menu">
<ul class="cat-menu">
	<?php foreach($categories as $cat): ?>
		<li class="categories" data-action="<?=$cat['nom_categoria']?>">
		<i class="material-icons"><?=$cat['icono_categoria']?></i>
		<?=$cat['nom_categoria']?>
		</li> 
	<?php endforeach;?>
</ul>
</section>

<section class="main">

	<section class="admin-form">
		<p style="text-align: center; margin-top: 10px;">Log-In d'Administrador</p>
		<form method="POST" action="index.php?action=admin&option=login" class="admin">
			<label for="Usuari">Usuari:</label><br>
			<input type="text" name="usuari" id="usuari" required><br>
			<br>
			<label for="passwd">Password:</label><br>
			<input type="password" name="passwd" id="passwd" required><br>
			<br>
			<button type="submit"> Log In </button>
		</form>
	</section>
	
</section>



<script src="resources/js/ajax.js"></script>
</body>
</html>