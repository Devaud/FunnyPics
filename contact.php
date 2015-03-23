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

        <section class="contenu" id="contenu">
            <center>
                <section class="block">
                    <section class='block-information'>
                        <h3 class='block-titre'>
                            Information
                        </h3>
                        <p class='block-text'>
                            FunnyPics réunit des photos trouvées sur le web ou envoyées par des utilisateurs du site web.
                        </p>
                        <p class='block-text'>
                            Pour nous envoyer votre image via ce formulaire passer par un hébergeur d'image tel que <a href='http://www.noelshack.com/'>NoelShack</a> qui permet de créer une url avec votre image.
                            Puis envoyer nous l'url de votre image avec, si vous le voulez, le commentaire que vous voulez afficher sous l'image.
                        </p>
                    </section>
                    <fieldset>
                        <legend>
                            Contact
                            <span>Vous êtes toujours la bienvenue dans la boîte mail</span>
                        </legend>
                        <form class="sForm" method="post" action="" >
                            <section class="sForm-sec">
                                <label>Nom</label>
                                <input type="text" name="nom" />
                            </section>

                            <section class="sForm-sec" >
                                <label>E-Mail</label>
                                <input type="email" name="email" />
                            </section>

                            <section class="sForm-sec" >
                                <label>Sujet</label>
                                <select>
                                    <option>Proposer une image</option>
                                    <option>Signaler un bug sur le site</option>
                                    <option>Autre</option>
                                </select>
                            </section>

                            <section class="sForm-sec" >
                                <label>Commentaires</label>
                                <textarea rows="6" cols='6'></textarea>
                            </section>

                            <section class="sForm-Button">
                                <button type="submit" name="valider" id="envoyer" class="btn btn-default">Envoyer</button>
                            </section>
                        </form>
                    </fieldset>
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
