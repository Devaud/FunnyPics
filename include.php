<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

include './DB/categoriesdb.php';
include './DB/picturesdb.php';



/* * **********************************************
 *  **          VARIABLES GLOBALES              ***
 *  ********************************************* */

$page = 'home';
$connect = false;
$user = '';

/* * ***********************************************
 *  **           GESTION DE LA SESSION           ***  
 *  ********************************************** */

/*
 * Charge les variables depuis la session
 */

function LoadFromSession() {
    global $page, $connect, $user;

    if (isset($_SESSION['page'])) {
        $page = $_SESSION['page'];
    }

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    if (isset($_SESSION['connect'])) {
        $connect = $_SESSION['connect'];
    }
}

/*
 * Save les variables dans la session
 */

function SaveInSession() {
    global $page, $user, $connect;

    $_SESSION['page'] = $page;
    $_SESSION['user'] = $user;
    $_SESSION['connect'] = $connect;
}

/* * ***********************************************
 *  **          GESTION DE LA NAVIGATION         ***  
 *  ********************************************** */

/*
 * Lit la page de destination reçue
 */

function ManageNavigation() {
    global $page;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
}

/* * ***********************************************
 *  **       AFFICHAGE DES BLOCS DE LA PAGE      ***  
 *  ********************************************** */

/**
 * Affiche les catégories dans la popup
 * @return string html éléments liste catégorie
 */
function displayCategories() {
    $text = '';

    $array = getCategories();

    foreach ($array as $cat) {
        $nbPics = totalPictures($cat['idCategorie']);
        $text .= '<li><a class="cat" data-info="' . $cat['idCategorie'] . '">' . $cat['categorie'] . '<span class="menu_cat-notifInfo">' . $nbPics . '</span></a></li>';
    }

    return $text;
}

/**
 * Affiche le menu de navigation
 * @global string $page nom de la page courrante
 * @return string code html à afficher
 */
function displayNav() {
    global $page;

    $text = '';

    $text .= '<section class="sec-sup">';
    $text .= '<nav class="nav-sup">';
    $text .= '<center>';
    $text .= '<ul>';
    if ($page == 'home') {
        $text .= '<li><a class="active">Random</a></li>';
        $text .= '<li><a class="categorie" data-rel="categorie">Catégorie</a></li>';
    } else {
        $text .= '<li><a href="./index.php?page=home" class="randomPic">Random</a></li>';
    }

    $text .= '</ul>';
    $text .= '</center>';
    $text .= '</nav>';
    $text .= '</section>';

    return $text;
}

/**
 * Affiche le pied de page
 * @return string code html à afficher
 */
function displayFooter() {
    $text = '';
    $text .= '<footer class="footer">
            <section class="footer-left">
                <p>
                    Developed by Squibbles - &copy; Arcnose 2015
                </p>
            </section>

            <section class="footer-middle">
                <center>
                    <ul>
                        <li><a href="./contact.php?page=contact">Contact</a></li>
                        <li><a>A propos</a></li>
                        <li><a href="../adminFunnyPics/index.php?page=login">Administration</a></li>
                    </ul>
                </center>
            </section>

            <section class="footer-right">

            </section>
        </footer>';

    return $text;
}

/* * ***********************************************
 *  **          FONCTIONS SUPPLEMANTETRES        ***  
 *  ********************************************** */