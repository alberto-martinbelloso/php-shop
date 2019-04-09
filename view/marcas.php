
<div class="menu_marcas">
	<ul class="llista_marcas">
	<?php foreach($marcas as $brand): ?>
		<li class="marcas" prod_cat="<?=$brand['nom_categoria']?>" prod_brand="<?=$brand['nom_marca']?>">
		<img style="height:40px;width:40px;" src="resources/img/<?=$brand['foto_marca']?>" alt ="">
		<p><?=$brand['nom_marca']?></p>
		</li>
	<?php endforeach;?>
	</ul>
</div>