
$(document).ready(function(){

	$(document).on('click', '.categories', function () {
		var url = "index.php?action=products&category=" + $(this).attr("data-action") + "&brand=totes";
		console.log(url);
    	$(".main").load(url);
	});
	$(document).on('click', '.marcas', function () {
			var url = "index.php?action=products&category="+$(this).attr("prod_cat") + "&brand="+$(this).attr("prod_brand");
			console.log(url);
	    	$(".main").load(url);
	});


	$(document).on('click', '.foto_prod', function () {
			var url = "index.php?action=details" + "&id="+$(this).attr("prod-det");
			console.log(url);
	    	$(".product_list").load(url);
	});
	$(document).on('click', '.foto_prod_carrito', function () {
			var url = "index.php?action=details" + "&id="+$(this).attr("p-id");
			console.log(url);
	    	$(".main").load(url);
	});





	$(document).on('click', '.register', function () {
			var url = "index.php?action=register";
			console.log(url);
	    	$(".main").load(url);
	});

	$(document).on('click', '.dades', function () {
			var url = "index.php?action=user&option=mostrar";
			console.log(url);
	    	$(".main").load(url);
	});

	$(document).on('click', '.login', function () {
			var url = "index.php?action=login";
			console.log(url);
	    	$(".main").load(url);
	});

	$(document).on('click', '.llista_compres', function () {
		var url = "index.php?action=user&option=llista_compres";
		$(".main").load(url);
	});




	window.afegirAlCarret = function (id) {
			var url = "index.php?action=carret&option=afegir&prod="+ id;
			console.log(url);
			$(".quantitat").load(url);
	}

	$(document).on('click', '.mostrar_carrito', function () {
			var url = "index.php?action=carret&option=mostrar";
			console.log(url);
	    	$(".main").load(url);
	});

	$(document).on('click', '.borrar', function () {
		var id = $(this).parent().attr('prod-id');
		var url = "index.php?action=carret&option=eliminar&prod="+ id;
		console.log(url);
		var url1 = "index.php?action=carret&option=mostrar";
		console.log(url1);
		$(".quantitat").load(url, function () {
			$(".main").load(url1);
		});
	});


	$(document).on('click', '.account', function () {
		$(".account_info").toggle();

	});
	setTimeout( function() {
		$(".confirmation").hide();
	},2000); 


	$(document).on('click', '.comprar', function () {
		var url = "index.php?action=carret&option=comprar";
		var url1 = "index.php?action=carret&option=mostrar";
		$(".quantitat").load(url);
		alert("Compra realitzada! Pot veure les seves compres al menú d'usuari");
		$(".main").load(url1);
	});



	$(document).on('click', '.op_alta', function () {
		var url = "index.php?action=admin&option=op_alta";
		$(".main").load(url);
	});


	$(document).on('click', '.busca', function () {
		$(".text_b").toggle();
		$('.text_b').focus();
	});

	$(document).on('input', '.text_b', function () {
		var url = "index.php?action=buscador&text=" + $(this).val();
		console.log(url);
		$('.main').load(url);
	});
});







