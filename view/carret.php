<?php 
	setlocale(LC_MONETARY,"es_ES.UTF-8");
?>

<?php $preu_total=0 ?>

<div class="carrito">
	<div class="tots_productes">
		<?php foreach($carret as $k => $v): ?>
			<div class="producte_carrito" prod-id="<?=$v['id_producte']?>" >
				<img src="resources/img/<?=$v['foto_producte']?>" class="foto_prod_carrito" p-id="<?=$v['id_producte']?>" alt="">
				<p class="model"> <?=$v['nom_marca']?> <?=$v['model_producte']?> </p>
				<p class="preu"> <?=money_format("%.0n", $v['preu_producte'])?> </p>
				<p class="cantidad"> x<?=$_SESSION['carrito'][$v['id_producte']]?></p>
				<span class="borrar"> x </span>
				<?php $preu_total += $v['preu_producte'] * $_SESSION['carrito'][$v['id_producte']]?>
			</div> 	
		<?php endforeach; ?>
	</div>
	<div class="total"> 
		<b class="preutot">PREU TOTAL </b>
		<b class="preu_t"> <?=money_format("%.0n", $preu_total)?></b>
		<button class="comprar"> Compra </button>
	</div>

</div>

