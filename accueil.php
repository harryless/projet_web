<?php session_start( ); ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>


    vous etes sur la page d Accueil
</br></br></br></br>
</br></br></br></br>

<?php
echo "bonjour monsieur  : ".$_SESSION['nom']." ".$_SESSION['prenom'];
 ?>

  </head>
  <body>

  </body>
</html>
