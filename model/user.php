<?php
require_once("model/db.php");

function guardarUsuari($conn, $nom, $user, $password, $email, $tlf, $adr, $poblacio, $cp, $tarjeta) {

    $options = array("nom"=>$nom, "user"=>$user, "password"=>$password, "email"=>$email, "tlf"=>$tlf, "adr"=>$adr, "poblacio"=>$poblacio, "cp"=>$cp, "tarjeta"=>$tarjeta);
	
    $sql = "INSERT INTO usuaris 
        (nom, usuari, password, email, telefon, adreça, poblacio, codi_postal, targeta_bancaria) 
        VALUES (:nom, :user, :password, :email, :tlf, :adr, :poblacio, :cp, :tarjeta)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
}

function actualitzarUsuari($conn, $id, $nom, $user, $password, $email, $tlf, $adr, $poblacio, $CP, $tarjeta) {

    /*if ($password == null) {
        $options = array("id"=>$id, "nom"=>$nom, "user"=>$user, "email"=>$email, "tlf"=>$tlf, "adr"=>$adr, "poblacio"=>$poblacio, "CP"=>$CP, "tarjeta"=>$tarjeta);
        
        $sql = "UPDATE usuaris 
            SET nom=:nom, usuari=:user, email=:email, telefon=:tlf, 
            adreça=:adr, poblacio=:poblacio, codi_postal=:CP, targeta_bancaria=:tarjeta
            WHERE client_id=:id";
    }*/
    //else {
        echo '<script language="javascript">alert("juas");</script>';
        $options = array("id"=>$id, "nom"=>$nom, "user"=>$user, "password"=>$password, "email"=>$email, "tlf"=>$tlf, "adr"=>$adr, "poblacio"=>$poblacio, "CP"=>$CP, "tarjeta"=>$tarjeta);
        
        $sql = "UPDATE usuaris 
            SET nom=:nom, usuari=:user, password=:password, email=:email, telefon=:tlf, 
            adreça=:adr, poblacio=:poblacio, codi_postal=:CP, targeta_bancaria=:tarjeta
            WHERE client_id=:id";
    //}

    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
}

function loginUsuari($conn, $user, $password) {

    $options = array("user"=>$user);

    $sql = "SELECT client_id, password FROM usuaris WHERE usuari=:user";
    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }

    if(count($array) == 0) {
        return -1;
    }
    else {
        if(password_verify($password, $array[0]['password'])) {
            return $array[0]['client_id'];
        }
        else {
            return -1;
        }
    } 
}

function getDadesUsuari($conn, $id, $admin) {
    
    $options = array("id"=>$id);

    if ($admin == 0) $sql = "SELECT * FROM usuaris WHERE client_id=:id";
    else $sql = "SELECT * FROM admin WHERE admin_id=:id";

    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }

    return $array;
}

function getCompresUsuari($conn, $id) {
    
    $options = array("id"=>$id);

    $sql = "SELECT * FROM compres WHERE usuari=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }

    return $array;
}

function loginUsuariAdmin($conn, $user, $pass) {

    $options = array("user" => $user);

    $sql = "SELECT admin_id, password FROM admin WHERE usuari=:user";
    $stmt = $conn->prepare($sql);
    $stmt->execute($options);
    $array = array();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
        array_push($array, $v);
    }

    if(count($array) == 0) {
        return -1;
    }
    else {
        if(password_verify($pass, $array[0]['password'])) {
            return $array[0]['admin_id'];
        }
        else {
            return -1;
        }
    } 
}

?>