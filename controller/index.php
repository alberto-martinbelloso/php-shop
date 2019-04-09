<?php 
require_once("model/category.php");

$categories = getCategories($conn);

require_once("view/index.php"); 
?>