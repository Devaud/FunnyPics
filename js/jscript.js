/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var array_id = new Array();
var current_cat = 1;

/**
 * Gestion des popups
 * @returns {undefined} ne retourne rien
 */
function popup() {
    $("a.categorie").on("click", function() {
        var popID = $(this).data('rel'); //Trouver la pop-up correspondante

        // Modifi la taille du contenu
        $('#contenu').css({
            'width': '80%'
        });

        // Affiche la popup
        $('#' + popID).fadeIn();

        return false;
    });

    $('body').on("click", "#contenu, a.close, a.cat", function() {

        // Efface la popup
        $("#categorie").fadeOut(function() {
            $('#contenu').css({
                'width': '100%'
            });
        });

        return false;
    });
}

/**
 * Fonction random entre deux nombre
 * @param {integer} min le minimum
 * @param {integer} max le maximum
 * @returns {Number} Retourne le nombre générer
 */
function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Fonction change la catégorie
 * @returns {undefined} 
 */
function changeCat() {
    $('a.cat').on("click", function() {
        current_cat = $(this).data("info");
        init_array(current_cat);

        // Modifie le background
        $('a.cat').removeClass("active");
        $(this).addClass("active");
    });
}

/**
 * Fonction pour la requete ajax
 * @param {String} type type de la transmisssion (GET/POST)
 * @param {String} url url de la page à contacter
 * @param {String} data Information que la page php doit traiter
 * @param {String} success_response ce qu'il faut faire en cas de success
 * @param {String} url2 url de l'image générée
 * @returns {undefined} ne retourne rien
 */
function requestAjax(type, url, data, success_response, url2) {
    $.ajax({
        type: type,
        url: url,
        data: data,
        success: function(server_response) {
            switch (success_response) {
                case "random" :
                    $("a.randomPic").html(server_response).show();
                    $("section.dl").html(url2).show();
                    break;
                case "recupId" :
                    var id = server_response;
                    array_id = id.split(",");
                    array_id.splice($.inArray("", array_id), 1);
                    break;
            }

        }
    });
}

/**
 * Charge un id aléatoirement
 * @returns {integer} id pris aléatoirement dans le tableau d'id
 */
function randomId() {
    var nbRand = rand(0, array_id.length - 1);
    return array_id[nbRand];
}

/**
 * Charge une image aléatoire
 * @returns {undefined}
 */
function randomPics() {
    $('.block').on("click", "button.btn-image-suivant, a.randomPic", function() {
        var id = randomId();
        var data = "categorie=" + current_cat + "&id=" + id;
        var url = "<span>Direct link:</span><a href=\"./read.php?page=read&pics=" + id + "\" >read.php?page=read&pics=" + id + " </a>";
        requestAjax("GET", "random.php", data, "random", url);
    });
}

/**
 * Initialise le tableau des id
 * @param {integer} cat id de la catégorire
 * @returns {undefined}
 */
function init_array(cat) {
    var data = "categorie=" + cat;
    requestAjax("GET", "recupId.php", data, "recupId", 0);
}

/**
 * Généralise toute les fonctions qui sont lancé au chargement de la pages
 * @returns {undefined}
 */
function onLoad() {
    init_array(current_cat);
}

/**
 * Fonction général de JQuery
 */
$(function() {
    popup();
    changeCat();
    randomPics();
    onLoad();
});

