<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="modification_habilitation.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <?php session_start(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>

    <?php
    // Connexion + entête de la page
    require 'connexion.php';
    require 'header.php';
    ?>

    <!-- Page accueil -->
    <div id="enter">
        <div class="row">
            <div class="col-lg-12" id="dcPicture">
                <h1 id="welcome" data-uk-scrollspy="{cls:'uk-animation-fade', delay:300, repeat:true}">
                    Création d'habilitation
                </h1>
            </div>

            <br><br><br>

            <!-- Boutons permettant de différencier RSI et Datafactory -->
            <!-- Bouton Data factory -->
            <form action="tampon_accueil.php" method="post">
                <button style="margin-left: 40%">
                    <div class="left" data-uk-scrollspy="{cls:'uk-animation-slide-right'}">
                        <h1 id="commercial"> Data factory</h1>
                        <!-- Affichage de l'image -->
                        <img class="home" src="Ressource/maison.png" height="100" width="100 ">
                    </div>
                </button>

                <!--Permet de différentiel les bouton du pole Safe ou RSI -->
                <input type="hidden" name="Pole" value="Safe">
            </form>

            <!-- Bouton RSI -->
            <form action="tampon_accueil.php" method="post">
                <button style="margin-left: 40%">
                    <div class="fright" data-uk-scrollspy="{cls:'uk-animation-slide-right'}">
                        <h1 id="commercial">RSI</h1>
                        <img class="biz" src="Ressource/modification.png" height="100" width="100">
                    </div>
                </button>
                <input type="hidden" name="Pole" value="RSI">
            </form>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br>

        <!-- Bande noir de séparation -->
        <section class='hero is-dark'>
            <div class='hero-body'>
                <div class='container'></div>
            </div>
        </section>

</body>

</html>