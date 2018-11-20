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
       echo "<li style='display:inline-block;'>";
       $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE', $titre );
       $photo = str_replace(" ", "_",$photo);
       $photo = "Photos/".$photo.".jpg";
     echo  "<div id='produitAffiche1'> <ul class='list-inline'><img

     class='img-rounded zoom' src='$photo' width='150' height='150'/></ul>";
       echo "titre : ".$recette['titre']."</br></br> ingredients : ".$recette['ingredients']."</br> </br> preparation :".
       $recette['preparation']."</br>";
     }
    }



?>

  </body>

</html>
