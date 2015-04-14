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

if(isset($_GET['pics'])){
    $idPic = $_GET['pics'];
    $idCat = 1;
    $url = getPictureWithCat($idCat, $idPic);
}else{
    header('location: index.php?page=home');
    exit();
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/style.css" />
        <script src='./js/jquery-2.1.3.min.js'></script>
        <script src="./js/jscript.js"></script>
        <title>FunnyPics - Viewer</title>
    </head>
    <body>
        <?php
        echo displayNav();
        ?>

        <section class="contenu" id="contenu">
            <center>
                <section class="block">
                    <section class="block-img">
                        <a href="./index.php?page=home">
                            <img src="<?php echo $url['picturesPath']; ?>" alt="randomPictures"/>
                            <span><?php echo $url['comments']; ?></span>
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
