<?php
// Fonction NIMBuzz
function testNIM($nombre1, $nombre2)
{
    // Nous vérifions que le nombre de départ est plus petit que le nombre de fin
    if ($nombre1 <= $nombre2) {
        // Nous faisons une boucle allant du nombre de départ jusqu'au nombre de fin
        for ($i = $nombre1; $i <= $nombre2; $i++) {
            // Nous testons d'abord si le nombre est à la fois divisible par 3 et 5 pour les doublons sinon
            if (($i % 3 === 0) && ($i % 5 === 0)) {
                echo ('<div class="nimbuzz"> NIM <br> Buzz <br></div>');
                // Nous testons si le nombre est divisible par 3 sinon
            } else if ($i % 3 === 0) {
                echo ('<div class="nim"> NIM <br></div>');
                // Nous testons si le nombre est divisible par 5 sinon
            } else if ($i % 5 === 0) {
                echo ('<div class="buzz"> Buzz <br></div>');
                // Nous affichons simplement le chiffre
            } else {
                echo ('<div class="nombre">' . $i . '<br> </div>');
            }
        }
        // Si le chiffre de départ est supérieur à celui de fin nous avertissons l'utilisateur
    } else {
        echo "<div> Votre nombre de début est supérieur au nombre de fin <br></div>";
    }
}
?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div>
        <div>
            <h1 style="text-align: center;">Résultat</h1>
        </div>
        <div class="containernim">
            <?php
            // Nous vérifions ici que l'utilisateur a bien envoyé les données sinon nous l'avertissons
            if (!empty($_POST['nbdebut']) && !empty($_POST['nbfin'])) {
                // Nous vérifions ici que l'utilisateur a bien envoyé des entiers sinon nous l'avertissons 
                // (c'est une précaution même si l'utilisateur ne peut uniquement entrer des entiers dans le formulaire)
                if (
                    filter_input(INPUT_POST, 'nbdebut', FILTER_VALIDATE_INT) &&
                    filter_input(INPUT_POST, 'nbfin', FILTER_VALIDATE_INT)
                ) {
                    testNIM($_POST['nbdebut'], $_POST['nbfin']);
                } else {
                    echo "Veuillez entrer des entiers valides";
                }
            } else {
                echo "Veuillez remplir les champs";
            };
            ?>
        </div>
    </div>
</body>

</html>