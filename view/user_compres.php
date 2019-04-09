
<div class="compres_user">

	<?php foreach ($compres as $c): ?>
		<div class="compra">
			<b style="font-size:25px">ID: <?=$c['id']?>-----------------------------</b>
			<p><?=$c['data']?></p>
			<?php foreach ($c['prods'] as $k => $v): ?>
				<?php foreach($v as $prod): ?>
					<div class="productes_compra">
						<img src="resources/img/<?=$prod['foto_producte']?>" alt="" style="width:180px; height:110px;">
						<p><?=$prod['nom_marca']?> <?=$prod['model_producte']?></p>
						<p><?=$prod['preu_producte']?></p>
					</div>
				<?php endforeach; ?>
			<?php endforeach; ?>
			<!-- <p><?=$c['id_productes']?></p> -->
		</div>
	<?php endforeach; ?>

</div>