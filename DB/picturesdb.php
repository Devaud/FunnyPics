<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './DB/connection.php';

/**
 * Récupère une image selon une categorie
 * @param integer $idCat id de la catégorie
 * @param integer $idPic id de l'image
 * @return string information sur l'image
 */
function getPictureWithCat($idCat, $idPic){
    $pdo = connect();
    $sql = 'SELECT picturesPath, comments FROM pictures as p JOIN etre as e ON p.idPictures = e.idPicture WHERE p.idPictures =:idP and e.idCategorie =:idC';
    $params = array("idP" => $idPic, "idC" => $idCat);
    $st = prepareExecute($sql, $pdo, $params)->Fetch();
    
    return $st;
}

/**
 * Récupère le nombre d'images total
 * @return string nombre d'images dans la base de données
 */
function totalPictures($idCat){
    $pdo = connect();
    $sql = "SELECT count(idPictures) as nbPics FROM pictures as p JOIN etre as e ON p.idPictures = e.idPicture WHERE e.idCategorie =:idC";
    $params = array("idC" => $idCat);
    $st = prepareExecute($sql, $pdo, $params)->Fetch();
    
    return $st['nbPics'];
}

/**
 * Récupère tout les id d'une catégorie
 * @param integer $idCat id de la catégorie
 * @return string liste de tout les id en une ligne séparer par ","
 */
function getId($idCat){
    $pdo = connect();
    $sql = "SELECT idPictures FROM pictures as p JOIN etre as e ON p.idPictures = e.idPicture WHERE e.idCategorie =:idC";
    $params = array("idC" => $idCat);
    $st = prepareExecute($sql, $pdo, $params)->FetchAll();

    return $st;
}
