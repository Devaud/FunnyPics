<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Effectue la connexion avec la base de données
 * @staticvar type $bdd
 * @return \PDO
 */
function connect(){
    $serveur = '127.0.0.1';
    $db = 'funnypics';
    $user = 'root';
    $pwd = '';
    
    static $bdd = null;
    
    if($bdd == null){
        $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO("mysql:host=$serveur;dbname=$db", $user, $pwd, $pdo_option);
        $bdd->exec('SET CHARACTER SET utf8');
    }
    
    return $bdd;
}

/**
 * Prépare et execute la requête
 * @param type $sql requete que l'utilisateur a écrit
 * @param type $pdo L'objet bdd 
 * @param type $params paramètre supplémentaire
 * @return type résultat de la requête
 */
Function prepareExecute($sql, $pdo, $params = NULL) {
    // Preparation de la requête sql
    $st = $pdo->prepare($sql);
    // Execution de la requête SQL.
    $st->execute($params);
    return $st;
}