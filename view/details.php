<?php 
	setlocale(LC_MONETARY,"es_ES.UTF-8");
?>


<div class="product_details">
	<div class="img_details">
		<img src="resources/img/<?=$details['foto_producte']?>" alt ="">
	</div>
	<div class="text_details">
		<p class="title"> <?=$details['nom_categoria']?> <?=$details['nom_marca']?> <?=$details['model_producte']?> </p>
		<b class="price"> <?=money_format("%.0n", $details['preu_producte'])?> </b>
		<p class="descripcio"> <?=$details['detail_producte']?></p> 
		<button class="afegir" onclick="afegirAlCarret(<?=$details['id_producte']?>)">Afegir!</button>
	</div>
	<br><br><br><br><br><br><br><br>
</div>

