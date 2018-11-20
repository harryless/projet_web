<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>

    <meta charset="utf-8">
    <title>info recette</title>


  info recette
</br></br></br></br>
<a href="accueil.php"> retourner a la page d 'accueil </a>
</br></br></br></br>

<?php
echo "bonjour monsieur  : ".$_SESSION['nom']." ".$_SESSION['prenom'];
 ?>
</br></br></br></br>
 </br></br></br></br>
  </head>
  <body >
  </br></br></br></br>
    </br></br></br></br>

  <?php


    foreach ($Recettes as $recette){
     $titre = $recette['titre'];
     if($_GET['titre']==$titre){
       echo "titre : ".$recette['titre']."</br> ingredients : ".$recette['ingredients']."</br> preparation :".
       $recette['preparation']."</br>";
     }
    }



?>

  </body>

</html>
