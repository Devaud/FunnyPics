<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "./include.php";

if (isset($_GET["categorie"]) && isset($_GET["id"])) {
    $text = '';
    
    $id = $_GET["id"];
    $idCat = $_GET["categorie"];
    $pic = getPictureWithCat($idCat, $id);

    $text .= '<img src="' . $pic['picturesPath'] . '" alt="randomPictures"/>';
    $text .= '<span>' . $pic['comments'] . '</span>';

    echo $text;
}


