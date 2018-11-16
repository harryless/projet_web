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
      $database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','');
      $login = $_POST['login'];
			$motDePasse = $_POST['passeword'];
      $sql = "SELECT login,motDePasse FROM utilisateur WHERE login == '$login'";
      $results=$database->query($sql);
      if ($results) {
          echo "string";
      }
      else {
        echo "query";
        }

      }



     ?>






  <body>

  </body>
</html>
