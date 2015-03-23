/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var array_id = new Array();
var current_cat = 1;

// Gestion des popup
function popup() {
    $("a.categorie").on("click", function () {
        var popID = $(this).data('rel'); //Trouver la pop-up correspondante

        // Modifi la taille du contenu
        $('#contenu').css({
            'width': '80%'
        });

        // Affiche la popup
        $('#' + popID).fadeIn();

        return false;
    });

    $('body').on("click", "#contenu, a.close, a.cat", function () {

        // Efface la popue
        $("#categorie").fadeOut(function () {
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
    $('a.cat').on("click", function () {
        oldCat = current_cat;
        current_cat = $(this).data("info");
        init_array(current_cat);

        // Modifie le background
        $('a.cat').removeClass("active");
        $(this).addClass("active");
    });
}

/**
 * Charge une image aléatoire
 * @returns {undefined}
 */
function randomPics() {
    $('.block').on("click", "button.btn-image-suivant, a.randomPic",function () {
        var nbRand = rand(0, array_id.length - 1);
        var id = array_id[nbRand];
        var data = "categorie=" + current_cat + "&id=" + id;

        $.ajax({
            type: "GET",
            url: "random.php",
            data: data,
            success: function (server_response) {
                $("a.randomPic").html(server_response).show();
            }
        });
    });
}

/**
 * Initialise le tableau des id
 * @param {integer} cat id de la catégorire
 * @returns {undefined}
 */
function init_array(cat) {
    var data = "categorie=" + cat;
    $.ajax({
        type: "GET",
        url: "recupId.php",
        data: data,
        success: function (server_response) {
            var id = server_response;
            array_id = id.split(",");
            array_id.splice($.inArray("", array_id), 1);
        }
    });
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
$(function () {
    popup();
    changeCat();
    randomPics();
    onLoad();
});

