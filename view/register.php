
<form class="registro" action="index.php?action=user&option=register" method="POST">
	Nom: <br>
	<input type="text" name="nom" pattern="[a-zA-Z\s]+" required>	<br>
	Usuari: <br>
	<input type="text" name="user" pattern="[a-zA-Z0-9]+" required>	<br>
	Password: <br>
	<input type="password" name="passwd" pattern="[a-zA-Z0-9]+" required> <br>
	E-mail: <br>
	<input type="email" name="email" required>	<br>
	Telefon: <br>		
	<input type="tel" name="telefon" class="tlf" size="9" maxlength="9" pattern="[0-9]{9}" required> <br>
	Adreça: <br>
	<input type="text" name="adreça" maxlength="30" pattern="[a-zA-Z0-9\s]+" required>	<br>
	Població: <br>
	<input type="text" name="poblacio" maxlength="30" pattern="[a-zA-Z\s]+" required>	<br>
	Codi Postal: <br>
	<input type="text" name="codi_postal" pattern="[0-9]{4}" maxlength="4" required>	<br>
	Targeta Bancària: <br>
	<input type="text" name="targeta" maxlength="16" pattern="[0-9]{16}" required>	<br><br>
	<input class="submit1" type="submit" value="Registre"><br>
</form>