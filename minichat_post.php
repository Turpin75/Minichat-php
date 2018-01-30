<?php
   
setcookie('pseudocookie', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Traitement message </title>
    </head>
    
    <body>

        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=tests_php;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
                die('Erreur : '. $e->getMessage());
        }
        
        if(!empty($_POST['pseudo']) AND !empty($_POST['message']))
        {

            $req = $bdd->prepare('INSERT INTO minichat (pseudo, message, datec) VALUES (?, ?, NOW())') or die(print_r($bdd->errorInfo()));
            $req->execute(array($_POST['pseudo'], $_POST['message']));
            
        }
        
            header('Location: minichat.php');
        ?>
        
    </body>
</html>