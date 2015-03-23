<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './include.php';
LoadFromSession();
ManageNavigation();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/style.css" />
        <script src='./js/jquery-2.1.3.min.js'></script>
        <script src="./js/jscript.js"></script>
        <title>FunnyPics</title>
    </head>
    <body>
        <?php
        echo displayNav();
        ?>
        <section class="sec-left" id="categorie">
            <h2>Catégories</h2>
            <ul class="menu_cat">
                <?php
                echo displayCategories();
                ?>
                <li>
                    <a class="close">Fermer</a>
                </li>
            </ul>
        </section>


        <section class="contenu" id="contenu">
            <center>
                <section class="block">
                    <button class='btn btn-image-suivant'>Image suivante</button>
                    <section class="block-img">
                        <a href="#" class="randomPic" data-info="1">
                            <img src="./media/cats_hello.jpg" alt="randomPictures"/>
                            <span>Comments</span>
                        </a>
                    </section>

                </section>
            </center>
        </section>

        <?php
        echo displayFooter();
        ?>
    </body>
</html>
<?php
SaveInSession();
?>
