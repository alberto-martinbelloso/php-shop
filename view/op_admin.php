

<?php if(isset($_SESSION['id_admin'])): ?>

	<div class="alta_producte">

		<form method="POST" class="form_alta" enctype="multipart/form-data" action="index.php?action=admin&option=alta">

			<label for="mod"> Model:</label> <br>
			<input type="text" name="model" id="mod" required> <br>		
			
			<label for="ll_categories"> Categoria:</label> <br>
			<select id="ll_categories" name="cat" class="categories_alta"> <br> 
				<?php foreach($categories as $cat): ?>
					<option value="<?=$cat['category_id']?>"> <?=$cat['nom_categoria']?> </option>
				<?php endforeach; ?>	
			</select> <br>

			<label for="ll_marcas"> Marca: </label> <br>
			<select id="ll_marcas" name="marca" class="marcas_alta"> <br>
				<?php foreach($marcas as $marca): ?>
					<option value="<?=$marca['marca_id']?>"> <?=$marca['nom_marca']?> </option>
				<?php endforeach; ?>	
			</select> <br>

			<label for="preu"> Preu:</label> <br>
			<input type="number" name="preu" id="preu" required> <br>	

			<label for="desc_c"> Descripció curta:</label> <br>
			<textarea id="desc_c" name="dc" rows="3" cols="50">
Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			</textarea> <br>

			<label for="desc_l"> Descripció llarga:</label> <br>
			<textarea id="desc_l" name="dl" rows="6" cols="50">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at velit ipsum. Praesent pretium congue enim, egestas lacinia sapien ullamcorper at. Duis efficitur nisl vel congue efficitur. Maecenas pharetra blandit lorem, vel molestie lorem maximus nec. Maecenas ullamcorper mi tincidunt ex aliquam, vel molestie sapien pretium. Fusce at interdum ligula. Proin viverra rhoncus felis, vel malesuada lectus. Vestibulum molestie euismod lobortis. In posuere mauris vel massa molestie, quis hendrerit leo fermentum. Phasellus fermentum arcu vel tortor vestibulum tempor. In consectetur risus vitae ipsum egestas aliquam. Curabitur lacinia maximus volutpat. Suspendisse hendrerit vulputate maximus. Quisque et rhoncus metus. Etiam dui risus, tristique quis risus sed, bibendum bibendum mauris. Duis nec metus aliquam lorem bibendum consequat sit amet hendrerit neque.
			</textarea> <br>


			<label for="foto"> Imatge:</label> <br>
			<input type="file" name="foto" id="foto" required> <br>	
			<input class="submit" type="submit" value="Alta"><br>

		</form>
	</div>
<?php endif; ?>