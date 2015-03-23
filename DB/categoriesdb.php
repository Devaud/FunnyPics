<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './DB/connection.php';

/**
 * Recherche toute les catégories
 * @return objects les catégories
 */
function getCategories(){
    $pdo = connect();
    $sql = "SELECT categorie, idCategorie FROM categories";
    $st = prepareExecute($sql, $pdo)->FetchAll();
    return $st;
}

