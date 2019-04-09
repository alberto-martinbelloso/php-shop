<?php

require_once("model/db.php");

function getCategories($conn) {


	$sql = "SELECT * FROM category";
	$stmt = $conn->prepare($sql); 
    $stmt->execute();
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) { 
        array_push($array, $v);
    }

	return $array;
}

?>