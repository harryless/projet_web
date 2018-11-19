<?php

session_start( );
 ?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/connexion.css">
    <title>Connexion</title>
    </head>
    <form class="connexion" action="" method="post">
      <div class="identifiant">
        <h2>Identifiant:</h2>
        <input type="text" name="login" value="">

      </div>
      <div class="mot de passe">
        <h2>Mot de passe:</h2>
        <input type="text" name="passeword" value="">
      </div>
      <input type="submit" name="valider" value="Connexion">
    </form>
    <?php
    if (isset($_POST['valider'])) {
      $database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
      $login = $_POST['login'];
			$motDePasse = $_POST['passeword'];
      $sql = "SELECT login,motDePasse,nom,prenom FROM utilisateur WHERE login like '$login'";
      $results=$database->query($sql);
      if ($row=$results->fetch()) {

          $_SESSION['prenom']=$row['nom'];
       $_SESSION['nom'] = $row['prenom'];
      

        header('Location: /projet_web/accueil.php');
          exit();
      }
      else {
        echo"login ou mot de passe  incorrect !!!</p>";
        }

      }



     ?>






  <body>

  </body>
</html>
