
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- google hosted jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="chat.css" />
        <title> Bienvenue sur le Chat! </title>
    </head>
    
    <body>
        <div id="contenu">
             <div id="formulaire">
                <form action="minichat_post.php" method="POST">
                    
                    <label for="pseudo"> Pseudo : </label> 
                    <input type="text" name="pseudo" id="pseudo" 
                    <?php if (isset($_COOKIE['pseudocookie'])) { echo ' value="' . $_COOKIE['pseudocookie'] . '"'; } ?> > <br/>
                   
                    <label for="message"> Message : </label> 
                    <input type="text" name="message" id="message" /> <br/>
                    
                    <input type="submit" value="Envoyer"> <input type="reset" value="Annuler" />
                    
                 </form>
                 
              </div>
            
            <!-- On pourrait supprimer la prtie suivante en n elaissant que la balise div, mais à chque recharge de la page cela mettra du temps à s'afficher.
                Le temps défini dans notre setInterval -->
            <div id="commentaires">
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
                        echo '<p> <strong>' . htmlspecialchars($donnees['pseudo']) . ' ' . $donnees['datec_fr'] . ' : </strong>' . 
                            htmlspecialchars($donnees['message']) . '</p>';
                    }
                
                    $reponse->closeCursor();
                ?>
            </div>
        </div>

        <!-- setInrerval permet d'exéxuter une fonction tous les xxx millisecondes
        Et la fonction load est une fonction jquery qui permet de charger le contenu d'un fichier -->
        <script type="text/javascript">
            setInterval('load_commentaires()', 500);
            function load_commentaires()
            {
                $('#commentaires').load('load_commentaires.php');
            }

        </script>

    </body>
</html>