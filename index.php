<?php
$prenom = htmlspecialchars($_POST['prenom']);
$choix = htmlspecialchars($_POST['choix']);
?>
<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <title>PHP Partie 7 exercice 7</title>
    </head>
    <body>
        <div class="container" id="page-top">
            <div class="row">
                <div class="col-xl-12">
                    <h1 align="center">PHP Partie 7 exercice 7</h1>
                    <h3 align="center">Exercice 7</h3>
                    <p align="center">Au formulaire de l'exercice 5, ajouter un champ d'envoi de fichier. 
                        Afficher en plus de ce qui est demandé à l'exercice 6, le nom et l'extension du fichier.</p>
                </div>
            </div>
            <?php if (!isset($_POST['valider'])) { ?>
                <form method="POST" enctype="multipart/form-data">
                    <div align="center">
                        <select name="choix">
                            <option value="Homme">Mr</option>
                            <option value="Femme">Mme</option>
                        </select>
                    </div>
                    <div align="center"><input type="text" placeholder="Votre nom" name="Nom" /></div>
                    <div align="center"><input type="text" placeholder="Votre prénom" name="prenom" /></div>
                    <div align="center"><input type="file" name="myFile" /></div>
                    <div align="center"><input type="submit" name="valider" value="Valider" /></div>
                </form>
                <?php
            } else {
                if (isset($_POST['Nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['choix']) && !empty($_POST['choix']) && isset($_FILES['myFile']) && $_FILES['myFile']['error'] == 0) {
                    $fileInfos = pathinfo($_FILES['myFile']['name']);
                    $fileExtension = $fileInfos['extension'];
                    $fileName = $fileInfos['filename'];
                    echo '<p align="center">Ton nom est: <b>' . $_POST['Nom'] . '</b> ,ton prénom est: <b>' . $prenom . ' </b> et tu es un(e) <b>' . $choix . ' </b>Votre fichier se nomme: <b>' . $fileName . ' </b> et son extension est: <b> ' . $fileExtension . '</p>';
                } else { // s'il nous manque un paramètre, on affiche l'echo ci-dessous
                    echo '<p align="center">Désolé, il manque un paramètre !</p>';
                }
            }
            ?>
        </div>
    </body>
</html>