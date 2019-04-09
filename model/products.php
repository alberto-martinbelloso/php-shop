<?php
require_once("model/db.php");

function getTotesMarcas($conn) {

    $sql = 'SELECT * FROM marca';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }

    return $array;
}

function getProducts($conn, $category) {

	$options = array("categoria" => $category);

	$sql = 'SELECT * FROM producte p, category c, marca m WHERE p.marca = m.marca_id AND p.category_producte=c.category_id AND p.activat = "1" AND c.nom_categoria=:categoria ORDER BY p.preu_producte DESC';
	$stmt = $conn->prepare($sql);
    $stmt->execute($options);
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }

	return $array;
}

function getMarcas($conn, $category) {

	$options = array("categoria" => $category);

	$sql = 'SELECT DISTINCT m.nom_marca, m.foto_marca, c.nom_categoria FROM marca m, producte p, category c WHERE p.category_producte = c.category_id AND p.marca = m.marca_id AND c.nom_categoria = :categoria';
	$stmt = $conn->prepare($sql);
    $stmt->execute($options);
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }

	return $array;
}

function getProducteMarcas($conn, $category, $marca) {

    $options= array("categoria" => $category, "marca" => $marca);

	$sql = 'SELECT DISTINCT * FROM marca m, producte p, category c WHERE p.category_producte=c.category_id AND p.marca = m.marca_id AND p.activat = "1" AND c.nom_categoria=:categoria AND m.nom_marca = :marca';
    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }
	return $array;
}

function productDetails($conn, $product) {

    $options = array("producte" => $product);

    $sql = 'SELECT * FROM producte p, marca m, category c WHERE p.category_producte=c.category_id AND p.marca = m.marca_id AND p.id_producte = :producte';
    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }
    return $array;
}

function mostrarCarret($conn, $elements) {

    $sql = "SELECT * FROM producte p, marca m, category c WHERE p.category_producte = c.category_id AND p.marca = m.marca_id AND p.id_producte IN ({$elements}) ORDER BY p.preu_producte DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }
    return $array;
}

function guardarCompra($conn, $elem, $data, $usuari) {

    $options = array("elem" => $elem, "data" => $data, "usuari" => $usuari);
    $sql = "INSERT INTO compres (id_productes, data, usuari) VALUES (:elem, :data, :usuari)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
}


function getProductesFromCompra($conn, $prods) {

    $sql = "SELECT DISTINCT * FROM producte p, category c, marca m WHERE p.category_producte = c.category_id AND p.marca = m.marca_id AND p.id_producte IN ({$prods})";


    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }

    return $array;
}

function buscar($conn, $search) {

    $search = "%".$search."%";

    $options = array("texto" => $search);

    $sql = 'SELECT DISTINCT * FROM producte p, marca m WHERE p.marca = m.marca_id AND p.model_producte LIKE :texto ORDER BY p.preu_producte DESC';


    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }

    return $array;
}

function pujarProducte($conn, $model, $categoria, $preu, $foto, $marca, $dc, $dl) {

    $foto_dir = __DIR__.'/../resources/img/'.$foto;
    $foto_type = pathinfo($foto_dir, PATHINFO_EXTENSION);

    if (file_exists($foto_dir)) {
        $_SESSION['error'] = "Aquest fitxer ja existeix";
        return;
    }    
    if($foto_type != "jpg" && $foto_type != "png" && $foto_type != "jpeg") {
        $_SESSION['error'] = "Selecciona una imatge";
        return;
    }

    $options = array("model"=>$model, "categoria"=>$categoria, "marca"=>$marca, "preu"=>$preu, "dc"=>$dc, "dl"=>$dl, "foto"=>$foto);

    $sql = "INSERT INTO producte (model_producte, category_producte, preu_producte, foto_producte, marca, det_producte, detail_producte) 
    VALUES (:model, :categoria, :preu, :foto, :marca, :dc, :dl)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($options);

    if(!move_uploaded_file($_FILES['foto']['tmp_name'], $foto_dir)) {
        $_SESSION['error'] = "La imatge no s'ha mogut correctament";
    }
}

?>