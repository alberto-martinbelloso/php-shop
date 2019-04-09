<?php 
	setlocale(LC_MONETARY,"es_ES.UTF-8");
?>

<div class="product_list">
	<?php foreach($productes as $prod): ?>
		<div class="productes" prod_cat1="<?=$prod['nom_categoria']?>" prod_brand1="<?=$prod['nom_marca']?>">
			<img class="foto_prod" src="resources/img/<?=$prod['foto_producte']?>" prod-det="<?=$prod['id_producte']?>" alt ="">
			<p class="titol_prod"> <?=$prod['nom_marca']?> <?=$prod['model_producte']?> </p>
			<p> <?=money_format("%.0n", $prod['preu_producte'])?></p>
			<p class="descripcio"> <?=$prod['det_producte']?></p> 
			<p class="af"> Afegir! <button class="afegir" onclick="afegirAlCarret(<?=$prod['id_producte']?>)">+</button> </p>
		</div>
	<?php endforeach;?>
	</ul>
</div>