<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "./include.php";

if(isset($_GET['categorie'])){
    $idCat = $_GET["categorie"];
    $array_id = getId($idCat);
    $array = "";
    
    foreach($array_id as $id){
        $array.= $id['idPictures'] .",";
    }
    
    echo $array;
}

