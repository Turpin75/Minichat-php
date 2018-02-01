<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=tests_php;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : ' .$e->getMessage());
    }

    $reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(datec, \'%d/%m/%Y à %H:%i:%s\') AS datec_fr
                        FROM minichat ORDER BY id DESC LIMIT 0, 10') or die(print_r($bdd->errorInfo()));
    
    while($donnees = $reponse->fetch())
    {
        // Création d'émoticones pour le chat
        $emojis = array(':)', ':(', ';)');
        $emojis_chemin = array('<img src="emojis/emo_smile.png" />', '<img src="emojis/emo_sad.png" />', '<img src="emojis/emo_wink.png" />');
        $donnees['message'] = str_replace($emojis, $emojis_chemin, $donnees['message']);

        echo '<p> <strong>' . htmlspecialchars($donnees['pseudo']) . ' ' . $donnees['datec_fr'] . ' : </strong>' . '<br />' .
            nl2br($donnees['message']) . '</p>';
    }

    $reponse->closeCursor();
?>
