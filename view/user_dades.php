


	<form class="dades_usuari" action="index.php?action=user&option=canviar" method="POST">
		Nom: <br>
		<input type="text" name="nom" value="<?=$dades['nom']?>" pattern="[a-zA-Z\s]+" required>	<br>
		Usuari: <br>
		<input type="text" name="user" value="<?=$dades['usuari']?>" pattern="[a-zA-Z0-9]+" required>	<br>
		Password: <br>
		<input type="password" name="password" pattern="[a-zA-Z0-9]+" required> <br>
		E-mail: <br>
		<input type="email" name="email" value="<?=$dades['email']?>" required>	<br>
		<?php if(!isset($_SESSION['id_admin'])): ?>
		Telefon: <br>		
		<input type="tel" name="telefon" value="<?=$dades['telefon']?>" pattern="[0-9]{9}" required> <br>
		Adreça: <br>
		<input type="text" name="adreça" value="<?=$dades['adreça']?>" pattern="[a-zA-Z0-9\s]+" required>	<br>
		Població: <br>
		<input type="text" name="poblacio" value="<?=$dades['poblacio']?>" pattern="[a-zA-Z\s]+" required>	<br>
		Codi Postal: <br>
		<input type="number" name="codi_postal" value="<?=$dades['codi_postal']?>" pattern="[0-9]{4}" required>	<br>
		Targeta Bancària: <br>
		<input type="number" name="targeta" value="<?=$dades['targeta_bancaria']?>" pattern="[0-9]{16}" required>	<br> <br> 
		<input type="submit" value="Modifica!"><br>
		<?php endif; ?>
	</form>