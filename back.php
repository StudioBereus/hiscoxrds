<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="back-main.js"></script>
    <link rel="stylesheet" href="back-style.css">
    <title>Liste des demandes</title>
</head>

<!-- PHP connexion-->
<?php
    include 'connexion.php';


    $afficheForm = true;



    if (isset($_POST['connexion'])) {

        if (isset($_POST["identifiant"]) && !empty($_POST["identifiant"]) && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {


            $rq = "SELECT * FROM assureur WHERE id = ? AND mdp= ?";
            $state = $connection->prepare($rq);
            $state->bindParam(1, $_POST['identifiant'], PDO::PARAM_STR);
            $state->bindParam(2, $_POST['mdp'], PDO::PARAM_STR);
            $state->execute();
            if ($state->rowCount() == 1) {

                $afficheForm = false;
                $rq = "SELECT * FROM assureur";
                echo '<table id="liste">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        
                    </tr>
                    </thead>
                    <tbody>';
                $state = $connection->prepare($rq);
                $state->execute(array());
                $resultat = $state->fetchAll();

                foreach ($resultat as $key => $ligne) {
                    echo '
                    <tr>
                        <td>' . $resultat[$key]['identifiant'] . '</td>
                        <td>' . $resultat[$key]["mdp"] . '</td>

                    </tr>';
                }
                echo '</tbody>
                </table>';

                echo '<div class="col-md-12 head">
                <div class="export">
                    <a href="dlCSV.php" class="export"><i class="dwn"></i>EXPORT</a>
                </div>
            </div>';
            } else {
                echo "<p class='non'>Connexion impossible, login ou mot de passe erroné</p>";
            }
        }
    }

    ?>

<!-- En-tête -->
<header>
    <div class="cont_logo">
        <img src="img/logo_hiscox.png" alt="logo_hiscox">
    </div>
</header>

<body>

<!--Login d'accès-->

<fieldset class="login" id="login">
    <form action="" method="POST">
        <p class="text_login_titre">Se connecter</p>
        <label for="identifiant">
            <p class="text_login">Identifiant</p>
            <input type="text" name="identifiant" id="identifiant" class="identifiant">
        </label>
    
        <label for="mdp">
            <p class="text_login">Mot de passe</p>
            <input type="text" name="mdp" id="mdp" class="mdp">
        </label>

        <br>

        <input type="button" value="SE CONNECTER" class="se_connecter">
    </form>
</fieldset>

<div class="cont_liste">

</div>

    
    
    
</body>

</html>