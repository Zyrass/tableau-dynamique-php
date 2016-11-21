<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tableau Dynamique en PHP + Export PDF</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Lien style CSS -->
        <link rel="stylesheet" href="css/myStyle.css" type="text/css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <h1>Tableau dynamique en PHP</h1>
        <hr />
                
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Début adhésion</th>
                <th>Fin adhésion</th>
                <th>Type</th>
                <th>Sexe</th>
            </tr>

            <?php 
                require('bdd.php'); // On se connecte à notre fichier bdd.php

                $ask = $bdd->query("SELECT * FROM adherants");
                while ($donnees = $ask->fetch()) {
            ?>

            <tr>
                <td><?php echo $donnees['nom']; ?></td>
                <td><?php echo $donnees['prenom']; ?></td>
                <td><?php echo $donnees['d_adhesion']; ?></td>
                <td><?php echo $donnees['f_adhesion']; ?></td>
                <td><?php echo $donnees['type']; ?></td>
                <td><?php echo $donnees['sexe']; ?></td>
            </t>

            <?php
                }
            ?>
        </table>  

        <fieldset>
            <legend>Générer le tableau au format PDF afin de le diffuser facilement</legend>
            <p><a href="export.php"><img src="pdf.png" alt="logo pdf">Cliquez vite ici afin de générer votre fichier PDF</a></p>    
        </fieldset>
    </body>
</html>